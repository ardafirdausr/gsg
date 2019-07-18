<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Illuminate\Database\QueryException;
use App\Models;
use Validator;

class GuestController extends Controller{

    public function connectChat(Request $request){
        session([
            'name' => $request->input('name'),
            'email' => $request->input('email')
        ]);
        return response('connected')
            ->cookie('name', $request->input('name'))
            ->cookie('email', $request->input('email'))
            ->cookie(
                'chat-connected', // key
                true, // value
                null, // time
                '/', // path
                null, // domain
                false, //secure
                false // http-only
            );
    }

    public function showHome(){
        $events = Models\Event::orderBy('id', 'desc')->limit(4)->get();
        $contents = Models\Content::orderBy('id', 'desc')->limit(4)->get();
        return view('guest.home', compact('events', 'contents'));
    }

    public function showAllContents(){
        $contents = Models\Content::orderBy('id', 'desc')->paginate(8);
        return view('guest.contents.contents', compact('contents'));
    }

    public function showContent(Request $request, $id){
        $content = Models\Content::find($id);
        return view('guest.contents.content-detail', compact('content'));
    }

    public function showAllEvents(){
        $events = Models\Event::orderBy('id', 'desc')->paginate(8);
        return view('guest.events.events', compact('events'));
    }

    public function showEvent(Request $request, $id){
        $event = Models\Event::find($id);
        return view('guest.events.event-detail', compact('event'));
    }

    public function showEventOrder(Request $request, $encodedOrderId){
        $id = base64_decode($encodedOrderId);
        $eventOrder = Models\Audience::with('event')->find($id);
        return view('guest.events.event-order', compact('eventOrder'));
    }

    public function showTicketEventOrder(Request $request, $encodedOrderId){
        $id = base64_decode($encodedOrderId);
        $eventOrder = Models\Audience::with('event')->find($id);
        $pdf = \PDF::loadView('guest.events.orderTemplate', compact('eventOrder'));
        return $pdf->stream("tiket.pdf");
    }

    public function showCreateEventOrderForm(Request $request, $id){
        $event = Models\Event::find($id);
        return view('guest.events.create-event-order-form', compact('event'));
    }

    public function storeEventOrder(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|regex:/^[a-zA-Z ]+$/',
            'phone' => 'required|string|regex:/^[0-9 ]+$/',
            'email' => 'required|string|regex:/^[a-zA-Z0-9_-]+@[a-zA-Z0-9-]+[.a-zA-Z0-9]+$/',
            'identity' => 'required|string|regex:/^[0-9]+$/'
        ]);
        if($validator->fails()){
            return redirect()->route('manage.contents.create')
                // ->withInput($request->input())
                ->withErrors($validator);
        }
        else{
            $event = Models\Event::find($id);
            if($event->capacity - 1 >= 0){
                try{
                    $eventOrder = Models\Audience::create([
                        'name' => $request->name,
                        'phone' => $request->phone,
                        'email' => $request->email,
                        'identity' => $request->identity,
                        'event_id' => $id
                    ]);
                    Models\Event::find($id)->decrement('capacity');
                    $encodedOrderId = base64_encode($eventOrder->id);
                    return redirect()->route('guest.event-order', compact('encodedOrderId'));
                }
                catch(QueryException $e){
                    $error = \Illuminate\Validation\ValidationException::withMessages([
                        'identity' => 'Nomor Identitas sudah terdaftar untuk event ini'
                     ]);
                    throw $error;
                    return view('guest.events.create-event-order', compact(['event', 'errors']));
                }
            }
            else{
                $errors = [
                    'global' => 'Kapasitas Sudah Penuh'
                ];
                return view('guest.events.create-event-order', compact(['event', 'error']));
            }
        }
    }
}



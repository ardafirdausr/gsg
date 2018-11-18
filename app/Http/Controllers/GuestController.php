<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Illuminate\Database\QueryException;
use App\Models;

class GuestController extends Controller{

    public function showHome(){
        return view('guest.home');
    }

    public function showContents(){
        $contents = Models\Content::all();
        return view('guest.contents', compact('contents'));
    }

    public function showContent($id){
        $content = Models\Content::find($id);
        return view('guest.content-detail', compact('content'));
    }

    public function showEvents(){
        $events = Models\Event::all();
        return view('guest.events', compact('events'));
    }

    public function showEvent($id){
        $event = Models\Event::find($id);
        return view('guest.event-detail', compact('event'));
    }

    public function showEventOrder($encodedOrderId){
        $id = base64_decode($encodedOrderId);
        $eventOrder = Models\Audience::find($id)->with('event')->first();
        $pdf = \PDF::loadView('guest.orderTemplate', compact('eventOrder'));
        return $pdf->stream("tiket.pdf");
        return view('guest.event-order', compact('eventOrder'));
    }

    public function createEventOrder($id){
        $event = Models\Event::find($id);
        return view('guest.create-event-order', compact('event'));
    }

    public function storeEventOrder(Request $request, $id){
        $validatedRequest = $request->validate([
            'name' => 'required|string|regex:/^[a-zA-Z ]+$/',
            'phone' => 'required|string|regex:/^[0-9\+\-\(\) ]+$/',
            'email' => 'required|string|regex:/^[a-zA-Z0-9\_\-]+@[a-zA-Z0-9\-]+[\.a-zA-Z0-9]+$/',
            'identity' => 'required|string|regex:/^[0-9]+$/'
        ]);
        $event = Models\Event::find($id);
        if($event->capacity - 1 >= 0){
            Facades\DB::beginTransaction();
            try{
                $eventOrder = Models\Audience::create([
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'identity' => $request->identity,
                    'event_id' => $id
                ]);
                Models\Event::find($id)->decrement('capacity');
                Facades\DB::commit();
                $encodedOrderId = base64_encode($eventOrder->id);
                return redirect()->route('guest.event-order', compact('encodedOrderId'));
            }
            catch(QueryException $e){
                $errors = [
                    'identity' => 'Nomor Identitas sudah terdaftar untuk event ini'
                ];
                Facades\DB::rollback();
                return view('guest.create-event-order', compact(['event', 'errors']));
            }
        }
        else{
            $errors = [
                'global' => 'Kapasitas Sudah Penuh'
            ];
            return view('guest.create-event-order', compact(['event', 'error']));
        }
    }
}

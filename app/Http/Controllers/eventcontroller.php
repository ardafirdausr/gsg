<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use App\Models\Event;

class EventController extends Controller
{

    public function showAllEvents()
    {
        $events = Event::orderBy('id', 'desc')->paginate(5);
        return view('manage.events.events', compact('events'));
    }

    public function showCreateEventForm()
    {
        return view('manage.events.create-event-form');
    }

    public function storeEvent(Request $request)
    {
        // $validatedRequest = $request->validate([
        //     'title' => 'required|string',
        //     'capacity' => 'required|string',
        //     'location' => 'required|string',
        //     'date' => 'required|date',
        //     'time' => 'required|time',
        //     'description' => 'required|string',
        //     'photo' => 'required|file|image|mimes:jpg,jpeg,png|size:2048'
        // ]);
        Facades\DB::Transaction(function() use($request){
            $uploadedPhoto = $request->file('photo');
            $photoName = base64_encode(microtime()).'.'.$uploadedPhoto->extension();
            $photo = Facades\Storage::disk('events')->putFileAs('/', $uploadedPhoto, $photoName);
            if($photo){
                $photo = Facades\Storage::disk('events')->url($photoName);
                Event::create([
                    'title' => $request->input('title'),
                    'capacity' => $request->input('capacity'),
                    'location' => $request->input('location'),
                    'date' => $request->input('date').' '.$request->input('time'),
                    'description' => $request->input('description'),
                    'photo' => $photo
                ]);
            }
        });
        return redirect()->route('manage.events.index');
    }

    public function destroyEvent($id)
    {
        Event::find($id)->delete();
        return redirect()->route('manage.events.index');
    }
}

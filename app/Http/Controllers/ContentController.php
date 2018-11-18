<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use Illuminate\Support\Facades;

class ContentController extends Controller
{
    public function index()
    {
        $contents = Content::get();
        return view('contents.index', compact('contents'));
    }

    public function create()
    {
        return view('contents.create');
    }

    public function store(Request $request)
    {
        // $validatedRequest = $request->validate([
        //     'title' => 'required|string',
        //     'creator' => 'required|string',
        //     'date_created' => 'required|date',
        //     'description' => 'required|string',
        //     'photo' => 'required|file|image|mimes:jpeg,bmp,png|size:2048'
        // ]);
        Facades\DB::transaction(function() use($request){
            $uploadedPhoto = $request->file('photo');
            $photoName = base64_encode(microtime()).'.'.$uploadedPhoto->extension();
            $photo = Facades\Storage::disk('contents')->putFileAs('/', $uploadedPhoto, $photoName);
            if($photo){
                $photo = Facades\Storage::disk('contents')->url($photoName);
                $content = Content::create([
                    'title' => $request->input('title'),
                    'creator' => $request->input('creator'),
                    'date_created' => $request->input('date_created'),
                    'description' => $request->input('description'),
                    'photo' => $photo
                ]);
            }
        });
        return redirect()->route('manage.contents.index');
    }

    public function show($id)
    {
        //
    }

    public function destroy($id)
    {
        Content::find($id)->delete();
        return redirect()->route('manage.contents.index');
    }
}

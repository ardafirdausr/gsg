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
        //     'created' => 'required|date',
        //     'description' => 'required|string',
        //     'photo' => 'required|file|image|mimes:jpeg,bmp,png|size:2048'
        // ]);
        Facades\DB::transaction(function() use($request){
            $content = Content::create($request->except('photo'));
            $uploadedPhoto = $request->file('photo');
            $photo = base64_encode($content->id).'.'.$uploadedPhoto->extension();
            Facades\Storage::disk('contents')->putFileAs('/', $uploadedPhoto, $photo);
            $photo = Facades\Storage::disk('contents')->url($photo);
            Content::find($content->id)->update(compact('photo'));
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

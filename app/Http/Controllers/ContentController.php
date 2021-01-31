<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use Illuminate\Support\Facades;
use Validator;

class ContentController extends Controller
{
    public function showAllContents(){
        $contents = Content::orderBy('id', 'desc')->paginate(5);
        return view('manage.contents.contents-management', compact('contents'));
    }

    public function showCreateContentForm(){
        return view('manage.contents.create-content-form');
    }

    public function storeContent(Request $request){
        $rule = [
            'title' => 'required|string|regex:/^[a-zA-Z0-9 -]{2,}$/',
            'creator' => 'required|string|regex:/^[a-zA-Z0-9 -]{2,}$/',
            'date_created' => 'required|date',
            'description' => 'required|string|regex:/^[a-zA-Z0-9 \-\,]{2,}$/',
            'photo' => 'required|file|image|mimes:jpeg,bmp,png|max:2048'
        ];
        $validator = Validator::make($request->all(), $rule);
        if($validator->fails()){
            $errors = $validator->messages();
            return redirect()->route('manage.contents.create')
                ->withErrors($validator->errors());
        }
        else{
            $uploadedPhoto = $request->file('photo');
            $photoName = base64_encode(microtime()).'.'.$uploadedPhoto->extension();
            $photo = Facades\Storage::disk('contents')->putFileAs('/', $uploadedPhoto, $photoName);
            $photo = Facades\Storage::disk('contents')->url($photoName);
            $content = Content::create([
                'title' => $request->input('title'),
                'creator' => $request->input('creator'),
                'date_created' => $request->input('date_created'),
                'description' => $request->input('description'),
                'photo' => $photo
            ]);
            return redirect()->route('manage.contents.index');
        }
    }

    public function destroyContent(Request $request, $id){
        Content::find($id)->delete();
        return redirect()->route('manage.contents.index');
    }
}

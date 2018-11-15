<?php

namespace App\Http\Controllers;

use Validator;
use Facades;
use Illuminate\Http\Request;
use App\Events;
// use Illuminate\Support\Facades;
use App\Models\Chat;

class ChatController extends Controller
{

    public function index(){
        return view('manage.chats.chats');
    }

    public function sendChat(Request $request){
        // $validRequest = Validator::make($request->only(
        //     ['name', 'from', 'to', 'message', 'image']), [
        //         'name' => 'string|required',
        //         'from' => 'string|email|required'
        // ]);
        $chat = Chat::create($request->all());
        if($chat){
            event(new Events\SendChat($chat));
            return 'yey';
        }
        return 'chat failed to send';
    }

    public function sendChatToGuest(){

    }
}

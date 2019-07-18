<?php

namespace App\Http\Controllers;

use Validator;
use DB;
use Cookie;
use Illuminate\Http\Request;
use App\Events;
// use Illuminate\Support\Facades;
use App\Models\Chat;

class ChatController extends Controller
{

    public function index(){
        //group by harus ada selectnya
        $guestChats = Chat::whereIn('id', Chat::select(DB::raw('MAX(id) as id'))->where('to', "=", 'admin@mail.com')->groupBy('from')->get())->get();
        $gusetChatsCount = Chat::select('from', DB::raw('COUNT(*) as unreaded'))->where('readed', '0')->groupBy('from')->get();
        return view('manage.chats.chats-management', compact('guestChats', 'gusetChatsCount'));
    }

    public function sendChat(Request $request){
        $chat = new Chat;
        $chat->name = session('name');
        $chat->from = session('email');
        $chat->to = $request->input('to');
        $chat->message = $request->input('message');
        $chat->save();
        $ev = event(new Events\SendChat($chat));
        return $chat;
    }

    public function getChatByEmail(Request $request, $email){
        $read = Chat::where('readed', false)->where('from', $email)->update(['readed' => true]);
        $chats = Chat::orderBy('id', 'desc')->where('from', $email)->orWhere('to', $email)->get();
        return $chats;
    }
}

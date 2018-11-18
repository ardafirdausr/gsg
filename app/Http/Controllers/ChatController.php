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
        return view('manage.chats.chats', compact('guestChats', 'gusetChatsCount'));
    }

    public function sendChat(Request $request){
        // $validRequest = Validator::make($request->only(
        //     ['name', 'from', 'to', 'message', 'image']), [
        //         'name' => 'string|required',
        //         'from' => 'string|email|required'
        // ]);
        $chat = new Chat;
        $chat->name = session('name');
        $chat->from = session('email');
        $chat->to = $request->input('to');
        $chat->message = $request->input('message');
        $chat->image = $request->input('image');
        $chat->save();
        if($chat){
            $ev = event(new Events\SendChat($chat));
            return $chat;
        }
        return 'chat failed to send';
    }

    public function getChatByEmail(Request $request, $email){
        DB::beginTransaction();
        try{
            $read = Chat::where('readed', false)
                ->where('from', $email)
                ->update(['readed' => true]);
            $chats = Chat::orderBy('id', 'desc')->where('from', $email)->orWhere('to', $email)->get();
            if(!!$read && !!$chats)
            DB::commit();
            return $chats;
        }
        catch(Error $e){
            return $e;
        }
    }
}

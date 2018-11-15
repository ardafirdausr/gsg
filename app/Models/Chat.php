<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model{

    protected $table = 'chats';

    protected $fillable = ['name', 'from', 'to', 'message', 'image', 'sent_at'];

    protected $visible = ['id', 'name', 'from', 'to', 'message', 'image', 'sent_at'];

    protected $guarded = ['id'];

    public $timestamps = false;

    public static function boot(){
        parent::boot();
        static::creating(function($chat){
            $chat->sent_at = date('Y-m-d H:i');
        });
    }
}

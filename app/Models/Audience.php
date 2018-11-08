<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Audience extends Model{

    protected $table = 'audiences';

    protected $fillable = ['identity', 'email', 'name', 'phone' , 'event_id'];

    protected $guarded = ['id'];

    protected $visible = ['id', 'identity', 'email', 'name', 'phone' , 'event_id'];

    public $timestamps = false;

    public function event(){
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }

}

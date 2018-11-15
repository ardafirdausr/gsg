<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['title', 'photo', 'description', 'date', 'capacity', 'created_at'];

    protected $visible = ['id', 'title', 'photo', 'description', 'date', 'capacity', 'created_at'];

    protected $guarded = ['id'];

    public $timestamps = false;

    public function audiences(){
        return $this->hasMany(Audience::class, 'event_id', 'id');
    }
}

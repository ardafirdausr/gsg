<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = "contents";

    protected $fillable = ['title', 'creator', 'date_created', 'description', 'photo'];

    protected $visible = ['id', 'title', 'creator', 'date_created', 'description', 'photo'];

    protected $guarded = ['id'];

    public $timestamps = false;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //
    public function comment (){
        $this->belongsTo(Comment::class);
    }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Message extends Model
{
    protected $guarder =[];


    public function user(){
        return $this->belongTo(User::class);
    }

}

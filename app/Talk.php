<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talk extends Model
{
    protected $table = 'talks';

    public function user(){
      return $this->belongsTo('App\User');
    }

    public function meeting(){
      return $this->belongsTo('App\Meeting');
    }
}

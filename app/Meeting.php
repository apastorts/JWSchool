<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $table = 'meetings';

    protected $with = ['talks'];

    public function openPray(){
        return $this->belongsTo(User::class, 'open');
    }

    public function closePray(){
        return $this->belongsTo(User::class, 'close');
    }

    public function talks()
    {
      return $this->hasMany(Talk::class);
    }

    public function createdBy()
    {
      return $this->belongsTo(User::class);
    }
}

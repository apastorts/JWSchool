<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $table = 'meetings';

    public function talks()
    {
      return $this->hasMany(Talk::class);
    }

    public function createdBy()
    {
      return $this->belongsTo(User::class);
    }
}
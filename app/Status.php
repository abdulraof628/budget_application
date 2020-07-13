<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';

    protected $guarded = ['id'];
    
    public function applications()
    {
        return $this->belongsTo('App\Applications');
    }
}

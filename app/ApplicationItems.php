<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationItems extends Model
{
    protected $table = 'application_items';

    protected $guarded = ['id'];
    
    public function applications()
    {
        return $this->belongsTo('App\Applications');
    }
}

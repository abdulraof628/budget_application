<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationItems extends Model
{
    protected $table = 'application_items';

    protected $guarded = ['id'];
}

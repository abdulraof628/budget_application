<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsageTypes extends Model
{
        protected $table = 'usage_types';
    
        protected $guarded = ['id'];
}

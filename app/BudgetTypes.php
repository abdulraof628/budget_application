<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BudgetTypes extends Model
{
    protected $table = 'budget_types';

    protected $guarded = ['id'];
}

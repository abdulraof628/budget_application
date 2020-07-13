<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applications extends Model
{
    protected $table = 'applications';

    protected $guarded = ['id'];
    
	public function budgetTypes()
	{
		return $this->hasOne('App\BudgetTypes','id','budget_type_id');
	}
	public function usageTypes()
	{
		return $this->hasOne('App\UsageTypes','id','usage_type_id');
	}
	public function status()
	{
		return $this->hasOne('App\Status','id','dean_status_id');
	}
	public function applicationItems()
	{
		return $this->hasMany('App\ApplicationItems','id','application_id');
	}
}

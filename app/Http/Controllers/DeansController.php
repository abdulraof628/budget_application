<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applications;
use App\ApplicationItems;
use App\UsageTypes;
use App\BudgetTypes;
use App\ApplicationItemTypes;

class DeansController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Dean');
    }

    public function index(){

        $data['applications'] = Applications::where('dean_status_id',3)->get();
        
        return view('deans.dashboard')->with($data);
    }

    public function newApplicationBudgetTypes(){

        $budgetTypes = BudgetTypes::get();
        return json_decode($budgetTypes);
    }
    
    public function newApplicationUsageTypes(){

        $usageTypes = UsageTypes::get();
        return json_decode($usageTypes);
    }
    
    public function applicationView(Request $request){

        $id = $request->appid;
        
        $data['application'] = Applications::where('id', $id)->first();
        $data['items'] = ApplicationItems::where('application_id', $id)->get();
        return json_encode($data);
    }
    
    public function applicationApproveDean(Request $request){

        $id = $request->appid;

        $data = Applications::where('id', $id)->first();
        $data->dean_status_id = 1;
        $data->save();

        return view('deans.dashboard');
        
    }
    
    public function applicationRejectDean(Request $request){

        $id = $request->appid;
        $remark = $request->remark;

        $data = Applications::where('id', $id)->first();
        $data->dean_status_id = 2;
        $data->dean_remark = $request->remark;
        $data->save();

        return view('deans.dashboard');
        
    }
}

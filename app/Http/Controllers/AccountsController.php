<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applications;
use App\ApplicationItems;
use App\UsageTypes;
use App\BudgetTypes;
use App\ApplicationItemTypes;

class AccountsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Account');
    }
    
    public function index(){

        $data['total_application'] = Applications::get();
        $data['approved_applications'] = Applications::where('dean_status_id',1)->where('bursary_status_id',1)->get();
        $data['rejected_applications'] = Applications::where('dean_status_id',2)->orWhere('bursary_status_id',2)->get();
        $data['inprogress_applications'] = Applications::where('dean_status_id',3)->orWhere('bursary_status_id',3)->get();
        
        return view('accounts.dashboard')->with($data);
    }

    public function newApplication(){
        
        $data['applications'] = Applications::where('dean_status_id',3)->get();

        return view('accounts.new_application')->with($data);
    }
    
    public function newApplicationBudgetTypes(){

        $budgetTypes = BudgetTypes::get();
        return json_decode($budgetTypes);
    }
    
    public function newApplicationUsageTypes(){

        $usageTypes = UsageTypes::get();
        return json_decode($usageTypes);
    }
    
    public function newApplicationItemTypes(){

        $applicationItemTypes = ApplicationItemTypes::get();
        return json_decode($applicationItemTypes);
    }

    public function newApplicationStore(Request $request){
        /* APPLICATION DATA */
        $dean_status_id = 3;
        $bursary_status_id = 3;

        $data['applications'] = new Applications([
            'title'  => $request->title,
            'justification'=>$request->justification,
            'budget_type_id'=>$request->budget_type_id,
            'usage_type_id'=>$request->usage_type_id,
            'total_price_applied'=>$request->total_price_applied,
            'dean_status_id'=>$dean_status_id,
            'bursary_status_id'=>$bursary_status_id,
        ]);
        $data['applications']->save();
        /* APPLICATION DATA */

        /* APPLICATION ITEM DATA */
        $name_array = $request->name;

        foreach($name_array as $key => $value){
            ApplicationItems::create([
                'name'=> $value,
                'item_type'=>$request->item_type[$key],
                'item_type_justification'=>$request->item_type_justification[$key],
                'price_per_unit'=>$request->price_per_unit[$key],
                'quantity'=>$request->quantity[$key],
                'uom'=>$request->uom[$key],
                'total_items_price'=>$request->total_items_price[$key],
                'application_id'=>$data['applications']->id,
            ]);
        }

        return redirect()->back();
        /* APPLICATION ITEM DATA */
    }
    
    public function applicationView(Request $request){
        $id = $request->appid;
        
        $data['application'] = Applications::where('id', $id)->first();
        $data['items'] = ApplicationItems::where('application_id', $id)->get();
        return json_encode($data);
    }
    
    public function applicationDelete($id){
        Applications::where('id',$id)->delete();

        return redirect()->route('new_application');
    }
    
    public function applicationEdit($id, Request $request){
        
        Applications::where('id',$id)->update([
            'title'  => $request->title, 
            'justification'=>$request->justification,
            'budget_type_id'=>$request->budget_type_id,
            'usage_type_id'=>$request->usage_type_id,
            'total_price_applied'=>$request->total_price_applied,
        ]);

        ApplicationItems::where('application_id',$id)->delete();

        $name_array = $request->name;

        foreach($name_array as $key => $value){
            ApplicationItems::where('id',$id)->update([
                'name'=> $value,
                'item_type'=>$request->item_type[$key],
                'item_type_justification'=>$request->item_type_justification[$key],
                'price_per_unit'=>$request->price_per_unit[$key],
                'quantity'=>$request->quantity[$key],
                'uom'=>$request->uom[$key],
                'total_items_price'=>$request->total_items_price[$key],
                'application_id'=>$data['applications']->id,
            ]);
        }
        return redirect()->route('new_application');
        /* APPLICATION DATA */
    }
    
}

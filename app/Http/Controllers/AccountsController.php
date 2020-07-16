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

        $data['total_application'] = Applications::with('status')->get();
        $data['approved_applications'] = Applications::where('dean_status_id',1)->where('bursary_status_id',1)->get();

        
        $data['rejected_applications_bursary'] = Applications::where('dean_status_id',1)->where('bursary_status_id',2)->count();
        $data['inprogress_applications_bursary'] = Applications::where('dean_status_id',1)->where('bursary_status_id',3)->count();


        $data['rejected_applications_dean'] = Applications::where('dean_status_id',2)->where('bursary_status_id',1)->get();
        $data['rejected_applications'] = Applications::where('dean_status_id',2)->where('bursary_status_id',2)->get();
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

    public function applicationEdit($id){
        
        $data['applications'] = Applications::where('id', $id)->first();
        $data['items'] = ApplicationItems::where('application_id', $id)->get();
        // dd( $data['items']);

        return view('accounts.edit_application', $data);
    }

    public function applicationUpdate($id, Request $request){
        $balance = ApplicationItems::where('application_id',  $id)->sum('total_items_price');
        $data['application_update'] = Applications::updateOrInsert(
            [
                'id'=>$id
            ],
            [
                'title'=>$request->title_update,
                'justification'=>$request->justification_update,
                'budget_type_id'=>$request->budget_type_id_update,
                'usage_type_id'=>$request->budget_type_id_update,
                'total_price_applied'=>$balance,
            ]
        );
        return redirect()->back();
    }

    public function itemUpdateNew($id, Request $request){
        
        ApplicationItems::create([
            'name'=> $request->name_update,
            'item_type'=>$request->item_type_update,
            'item_type_justification'=>$request->item_type_justification_update,
            'price_per_unit'=>$request->price_per_unit_update,
            'quantity'=>$request->quantity_update,
            'uom'=>$request->uom_update,
            'total_items_price'=>$request->total_items_price_update,
            'application_id'=>$id,
        ]);
    }

    public function itemDelete(Request $request){
        $id = $request->id;
        ApplicationItems::where('id',$id)->delete();

        return redirect()->back();
    }
    
}

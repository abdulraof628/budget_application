<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applications;
use App\ApplicationItems;
use App\UsageTypes;
use App\BudgetTypes;

class AccountsController extends Controller
{
    public function index(){
        return view('accounts.dashboard');
    }

    public function newApplication(){
        
        return view('accounts.new_application');
    }
    
    public function newApplicationBudgetTypes(){

        $budgetTypes = BudgetTypes::get();
        return json_decode($budgetTypes);
    }
    
    public function newApplicationUsageTypes(){

        $usageTypes = UsageTypes::get();
        return json_decode($usageTypes);
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
        if(isset($request->name)){
            for($count = 0; $count < count($name_array); $count++)
            {
                if (isset($request->name[$count])) {
                    ApplicationItems::create([
                        'name'=>$request->name[$count],
                        'item_type_id'=>$request->item_type[$count],
                        'item_type_justification'=>$request->item_type_justification[$count],
                        'price_per_unit'=>$request->price_per_unit[$count],
                        'quantity'=>$request->quantity[$count],
                        'uom'=>$request->uom[$count],
                        'total_items_price'=>$request->total_items_price[$count],
                        'application_id'=>$data['applications']->id,
                    ]);
                }
            }
        }
        /* APPLICATION ITEM DATA */
        return redirect()->back();
    }
    
    // public function deleteProduct($id){
    //     Inventory::where('id',$id)->delete();

    //     return redirect()->route('inventory');
    // }
    
}

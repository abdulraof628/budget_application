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

        foreach($name_array as $key => $value){
            ApplicationItems::create([
                'name'=> $value,
                'item_type_id'=>$request->item_type[$key],
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
    
    // public function deleteProduct($id){
    //     Inventory::where('id',$id)->delete();

    //     return redirect()->route('inventory');
    // }
    
}

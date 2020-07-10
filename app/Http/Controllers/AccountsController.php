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
        $data['applications'] = new Applications([
            'title'  => $request->title,
            'justification'=>$request->justification,
            'budget_type_id'=>$request->budget_type_id,
            'usage_type_id'=>$request->usage_type_id
        ]);
        $data['applications']->save();
        /* APPLICATION DATA */

        /* APPLICATION ITEM DATA */
        if(isset($request->item_name)){
            for($count = 0; $count < count($request->item_name); $count++)
            {
                if (isset($request->item_name[$count])) {
                    ApplicationItems::create([
                        'name'=>$request->name[$count],
                        'item_type_id'=>$request->item_type_id[$count],
                        'item_type_justification'=>$request->item_type_justification[$count],
                        'price'=>$request->price[$count],
                        'quantity'=>$request->quantity[$count],
                        'oum'=>$request->oum[$count],
                        'total_price_applied'=>$request->total_price_applied[$count],
                    ]);
                }
            }
        }
        /* APPLICATION ITEM DATA */
        return view('accounts.new_application');
    }
    
}

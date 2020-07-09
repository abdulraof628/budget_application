<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountsController extends Controller
{
    public function index(){
        return view('accounts.dashboard');
    }
    public function newApplication(){
        return view('accounts.new_application');
    }
}

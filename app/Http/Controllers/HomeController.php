<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Expense;
use App\Models\Revenue;
use App\Repositories\ClientRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{   
 

    public function index()
    {
        $clients = count(Client::all());
        $expenses = round(Expense::all()->avg('expense_value'),2);
        $revenues = round(Revenue::all()->avg('revenue_value'),2) ;
        return view('home',compact('clients','expenses','revenues'));
    }
}

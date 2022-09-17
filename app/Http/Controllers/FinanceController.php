<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Expense;
use App\Models\Revenue;
use App\Repositories\FinanceRepository;

class FinanceController extends Controller
{   
    protected $client;
    protected $rev;
    protected $exp;
    public function __construct(Client $client, Revenue $rev,Expense $exp)
    {
        $this->client = $client;
        $this->rev = $rev;
        $this->exp = $exp;
    }
    public function viewFinance($id)
    {
        if(! $client = $this->client->find($id)){
            return redirect()->back();
        }
        $exp = $client->expenses()->get();
        $rev = $client->revenues()->get();
        
        return view('finance',compact('client','exp','rev'));
    }
}

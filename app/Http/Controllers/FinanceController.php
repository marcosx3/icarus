<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Expense;
use App\Models\Revenue;
use App\Repositories\FinanceRepository;
use Illuminate\Support\Facades\DB;

class FinanceController extends Controller
{
    protected $client;
    protected $rev;
    protected $exp;
    private $totalRevenues = 0.0;
    public $totalExpenses = 0.0;
    public function __construct(Client $client, Revenue $rev, Expense $exp)
    {
        $this->client = $client;
        $this->rev = $rev;
        $this->exp = $exp;
    }
    public function viewFinance($id)
    {
        $firstDate = request('firstDate');
        $secondDate = request('secondDate');
        if ($firstDate && $secondDate) {
            if (!$client = $this->client->find($id)) {
                return redirect()->back();
            }
            
            $exp = DB::table('expenses')
            ->where('expense_client_id',$id)
            ->whereBetween('expense_month',[$firstDate,$secondDate])
            ->get();
            $rev = DB::table('revenues')
            ->where('revenue_client_id',$id)
            ->whereBetween('revenue_month',[$firstDate,$secondDate])
            ->get();
          
           
        } else {
            if (!$client = $this->client->find($id)) {
                return redirect()->back();
            }
            $exp = $client->expenses()->get();
            $rev = $client->revenues()->get();
        }
        dd($exp,$rev);
        return view('finance', compact('client', 'exp', 'rev','firstDate','secondDate'));
    }
    // public function searchFilter($firstDate,$secondDate)
    // {
    //    $client = DB::table('expenses')->select()->get();
    //     $exp = DB::table('expenses')
    //     ->select()
    //     ->whereBetween('expense_value',[$firstDate,$secondDate])
    //     ->get();
    //     $rev = DB::table('revenues')
    //     ->select()
    //     ->whereBetween('revenue_value',[$firstDate,$secondDate])
    //     ->get();
    //     dd($exp,$rev,$client);
    // }


}

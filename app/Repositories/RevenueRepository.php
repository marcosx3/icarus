<?php

namespace App\Repositories;


use App\Interfaces\RevenueInterface;
use App\Models\Revenue;
use Illuminate\Support\Facades\DB;

class RevenueRepository implements RevenueInterface
{

    public function all()
    {
        return Revenue::all();
    }
    public function create(array $data)
    {
       return  DB::table('revenues')
        ->insert([
         "revenue_name" => $data['revenue_name'],
         'revenue_value' => $data['revenue_value'],
         'revenue_month' => $data['revenue_month'],
         'created_at' => \Carbon\Carbon::now(),
         'updated_at' => \Carbon\Carbon::now(),
         'tb_client_id' => $data['clients'],
         'tb_type_revenue_id' => $data['type_revenue'],
       
        ]);
    }
    public function edit($id)
    {
        return Revenue::find($id);
    }
    public function update(array $data, $id)
    {
        return  DB::table('revenues')
        ->where('id',$id)
        ->update([
         "revenue_name" => $data['revenue_name'],
         'revenue_value' => $data['revenue_value'],
         'revenue_month' => $data['revenue_month'],
         'created_at' => \Carbon\Carbon::now(),
         'updated_at' => \Carbon\Carbon::now(),
         'tb_client_id' => $data['clients'],
         'tb_type_revenue_id' => $data['type_revenue'],
       
        ]);
       
    }
    public function delete($id)
    {
        Revenue::destroy($id);
    }
}

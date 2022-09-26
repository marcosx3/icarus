<?php

namespace App\Repositories;

use App\Interfaces\BaseInterface;
use App\Models\Client;
use Illuminate\Support\Facades\DB;

class ClientRepository implements BaseInterface
{
    public function all()
    {
        return Client::all();
    }
    public function create(array $data)
    {
        
        return DB::table('clients')
        ->insert([
            "name" => $data['name'],
            "email" => $data['email'],
            "phone_1" => $data['phone_1'],
            "phone_2" => $data['phone_2'],
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
    public function edit($id)
    {
        return Client::find($id);
    }
    public function update(array $data, $id)
    {
        // return Client::where('id', $id)->update($data);
          
        return DB::table('clients')
        ->where("id","=",$id)
        ->update([
            "name" => $data['name'],
            "email" => $data['email'],
            "phone_1" => $data['phone_1'],
            "phone_2" => $data['phone_2'],
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
    public function delete($id)
    {
        Client::destroy($id);
    }
    public function allForApha($id)
    {
    //     return DB::table('clients')
    //    ->select('id', 'username', 'parent')
    //    ->where('id', '>=', $user_id)
    //    ->orderBy('CAMPO', 'asc')
    //    ->get();
    }
}

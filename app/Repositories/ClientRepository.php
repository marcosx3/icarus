<?php

namespace App\Repositories;

use App\Interfaces\ClientInterface;
use App\Models\Client;
use Illuminate\Support\Facades\DB;

class ClientRepository implements ClientInterface
{
    public function all()
    {
        return Client::all();
    }
    public function create(array $data)
    {
        return Client::create($data);
    }
    public function edit($id)
    {
        return Client::find($id);
    }
    public function update(array $data, $id)
    {
        return Client::where('id', $id)->update($data);
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

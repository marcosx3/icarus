<?php

namespace App\Repositories;

use App\Interfaces\BaseInterface;
use App\Models\Client;

class ClientRepository implements BaseInterface
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
}

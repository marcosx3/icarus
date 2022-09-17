<?php

namespace App\Repositories;

use App\Interfaces\BaseInterface;
use App\Models\TypeRevenue;

class TypeRevenueRepository implements BaseInterface
{
    public function all()
    {
        return TypeRevenue::all();
    }

    public function create(array $data)
    {
        return TypeRevenue::create($data);
    }

    public function edit($id)
    {
        return TypeRevenue::find($id);
    }

    public function update(array $data, $id)
    {
        return TypeRevenue::where('id', $id)->update($data);
    }

    public function delete($id)
    {
        TypeRevenue::destroy($id);
    }
}

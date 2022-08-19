<?php

namespace App\Interfaces;

interface RevenueInterface
{
    public function all();
    public function create(array $data);
    public function edit($id);
    public function delete($id);
    public function update(array $data,$id);
}

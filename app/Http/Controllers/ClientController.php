<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUpdateClienteFormRequest;
use App\Repositories\ClientRepository;

class ClientController extends Controller
{
    private ClientRepository $model;

    public function __construct(ClientRepository $model)
    {
        $this->model = $model;
    }

    private function listAllClients()
    {
        $clients = $this->model->all();
        return view('client.list', compact('clients'));
    }

    public function createClientView()
    {
        return view('client.create');
    }

    public function createClient(CreateUpdateClienteFormRequest $request)
    {
        $data = $request->except('_token');
        $this->model->create($data);

        return $this->listAllClients();
    }

    public function listClientView()
    {
        return $this->listAllClients();
    }

    public function editClientView($id)
    {
        $client = $this->model->edit($id);
        return view('client.update', compact('client'));
    }

    public function editClient(CreateUpdateClienteFormRequest $request, $id)
    {
        $data = $request->except('_token');
        $this->clientRepository->update($data, $id);
        return $this->listAllClients();
    }
    public function destroyClient($id)
    {
        $this->clientRepository->delete($id);
        $this->listAllClients();
        return $this->listAllClients();
    }
}

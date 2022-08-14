<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUpdateClienteFormRequest;
use App\Interfaces\ClientInterface;
use App\Repositories\ClientRepository;

class ClientController extends Controller
{
    private ClientRepository $clientRepository;

    public function __construct(ClientInterface $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    private function listAllClients()
    {
        $clients = $this->clientRepository->all();
        return view('client.list', compact('clients'));
    }

    public function createClientView()
    {
        return view('client.create');
    }

    public function createClient(CreateUpdateClienteFormRequest $request)
    {
        $data = $request->except('_token');
        $this->clientRepository->create($data);

        return $this->listAllClients();
    }

    public function listClientView()
    {
        return $this->listAllClients();
    }

    public function editClientView($id)
    {
        $client = $this->clientRepository->edit($id);
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

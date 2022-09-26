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

    public function createClientView()
    {
        return view('client.create');
    }

    public function createClient(CreateUpdateClienteFormRequest $request)
    {
        $data = $request->except('_token');

        if ($this->model->create($data)) {
            return redirect()->route('client.list')->with('success', "Cliente cadastro com sucesso!");
        } else {
            return redirect()->route('client.list')->with('error', "Não foi possível cadastrar novo cliente");
        }
    }

    public function listClientView()
    {
        $clients = $this->model->all();
        return view('client.list', compact('clients'));
    }

    public function editClientView($id)
    {
        $client = $this->model->edit($id);
        return view('client.update', compact('client'));
    }

    public function editClient(CreateUpdateClienteFormRequest $request, $id)
    {
        $data = $request->all();
        if ($this->model->update($data, $id)) {
            return redirect()->route('client.list')->with('info', "Cadastro de cliente atualizado.");
        } else {
            return redirect()->route('client.list')->with('error', "Não foi possível atualizar cadastro do cliente.");
        }
    }
    public function destroyClient($id)
    {

        if ($this->model->delete($id)) {
            return redirect()->route('client.list')->with('info', "Usuário deletado.");
        } else {
            return redirect()->route('client.list')->with('error', "Não foi possível deletar cadastro de cliente.");
        }
    }
}

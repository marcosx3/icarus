<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUpdateClienteFormRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function createClientView()
    {
        return view('client.create');
    }
    public function createClient(CreateUpdateClienteFormRequest $request)
    {
        $data = $request->except('_token');
        $client = new Client();
        $client->name = $data['name'];
        $client->email = $data['email'];
        $client->phone_1 = $data['phone_1'];
        $client->phone_2 = $data['phone_2'];
       if( $client->save())
       {
        return redirect()->route("client.list", compact('clients'))->with("success", "Cliente cadastrado com sucesso!");
       }
       return redirect()->route("client.list", compact('clients'))->with("error", "Cliente não cadastrado.");
    }
    public function listClientView()
    {   
        $clients = Client::all();
        return view('client.list',compact('clients'));
    }
    public function editClientView($id)
    {
        $client = Client::find($id);
        return view('client.update',compact('client'));
    }
    public function editClient()
    {
    }
    public function destroyClient()
    {
    }
}

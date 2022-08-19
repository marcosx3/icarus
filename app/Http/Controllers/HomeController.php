<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Repositories\ClientRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(ClientRepository $clientRepository)
    {
      $this->clientRepository = $clientRepository;
    }

    public function index()
    {
        $clients = Client::all();
        return view('home');
    }
}

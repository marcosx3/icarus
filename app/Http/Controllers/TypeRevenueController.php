<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUpdateRevenueRequest;
use App\Http\Requests\CreateUpdateTypeRevenueRequest;
use App\Repositories\ClientRepository;
use App\Repositories\TypeRevenueRepository;


class TypeRevenueController extends Controller
{
    private TypeRevenueRepository $typeRevenueRepository;
    private ClientRepository $clientRepository;

    public function __construct(TypeRevenueRepository $typeRevenueRepository,ClientRepository $clientRepository)
    {
      
      $this->typeRevenueRepository = $typeRevenueRepository;
      $this->clientRepository = $clientRepository;
    }
    private function listRevenue()
   {
      $type_revenues = $this->typeRevenueRepository->all();
      $clients = $this->clientRepository->all();
      return redirect()->route('revenue.create.view', compact('clients', 'type_revenues'));
   }

   public function createTypeRevenueView()
   {
      return view('revenue.type.create');
   }

   public function listTypeRevenue()
   {
      $type_revenues = $this->typeRevenueRepository->all();
      return view('revenue.type.list', compact('type_revenues'));
   }

   public function createRevenueType(CreateUpdateTypeRevenueRequest $request)
   {
      $data = $request->except('_token');
      if ($this->typeRevenueRepository->create($data)) {
         return $this->listRevenue()->with('success', 'Tipo de receita criado com sucesso.');
      }
      return $this->listRevenue()->with('error', 'Não foi possivel criar tipo de receita.');
   }

   public function editTypeRevenueView($id)
   {
      $te = $this->typeRevenueRepository->edit($id);
      return view('revenue.type.update', compact('te'));
   }
   public function updateTypeRevenue(CreateUpdateTypeRevenueRequest $request, $id)
   {
      $data = $request->except('_token');
      if ($this->typeRevenueRepository->update($data, $id)) {
         return  redirect()->route('revenue.type.list')->with('success', 'Tipo de Receita Alterado com sucesso.');
      }
      return  redirect()->route('revenue.type.list')->with('error', 'Não foi possivel alterar o tipo de receita.');
   }
   public function deleteTypeRevenue($id)
   {
      if ($this->typeRevenueRepository->delete($id)) {
         return  redirect()->route('revenue.type.list')->with('info', 'Tipo de Receita excluido com sucesso.');
      }
      return  redirect()->route('revenue.type.list')->with('error', 'Não foi possivel excluir o tipo de receita.');
   }
   
}

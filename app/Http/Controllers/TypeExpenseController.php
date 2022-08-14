<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUpdateTypeExpenseRequest;
use App\Repositories\ClientRepository;
use App\Repositories\TypeExpenseRepository;


class TypeExpenseController extends Controller
{
   private TypeExpenseRepository $typeExpenseRepository;
   private ClientRepository $clientRepository;

   public function __construct(TypeExpenseRepository $typeExpenseRepository, ClientRepository $clientRepository)
   {
      $this->typeExpenseRepository = $typeExpenseRepository;
      $this->clientRepository = $clientRepository;
   }

   private function listExpense()
   {
      $type_expense = $this->typeExpenseRepository->all();
      $clients = $this->clientRepository->all();
      return redirect()->route('expense.create.view', compact('clients', 'type_expense'));
   }

   public function createTypeExpenseView()
   {
      return view('expense.type.create');
   }

   public function createTypeExpense(CreateUpdateTypeExpenseRequest $request)
   {
      $data = $request->except('_token');
      if ($this->typeExpenseRepository->create($data)) {
         return $this->listExpense()->with('success', 'Tipo de despesa criado com sucesso.');
      }
      return $this->listExpense()->with('error', 'Não foi possivel criar tipo de despesa.');
   }

   public function listTypeExpense()
   {
      $type_expenses = $this->typeExpenseRepository->all();
      return view('expense.type.list', compact('type_expenses'));
   }

   public function editTypeExpenseView($id)
   {
      $te = $this->typeExpenseRepository->edit($id);
      return view('expense.type.update', compact('te'));
   }

   public function updateTypeExpense(CreateUpdateTypeExpenseRequest $request, $id)
   {
      $data = $request->except('_token');
      if ($this->typeExpenseRepository->update($data, $id)) {
         return  redirect()->route('expense.type.list')->with('success', 'Tipo de Despesa Alterado com sucesso.');
      }
      return  redirect()->route('expense.type.list')->with('error', 'Não foi possivel alterar o tipo de despesa.');
   }

   public function deleteTypeExpense($id)
   {
      if ($this->typeExpenseRepository->delete($id)) {
         return  redirect()->route('expense.type.list')->with('info', 'Tipo de Despesa excluido com sucesso.');
      }
      return  redirect()->route('expense.type.list')->with('error', 'Não foi possivel excluir o tipo de despesa.');
   }
}

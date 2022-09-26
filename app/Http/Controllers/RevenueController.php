<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUpdateRevenueRequest;
use App\Models\Client;
use App\Repositories\RevenueRepository;


class RevenueController extends Controller
{
    protected RevenueRepository $model;
    public function __construct(RevenueRepository $model)
    {
        $this->model = $model;
    }

    private function createMoreRevenue(array $data)
    {
        if ($data['repeat'] != 0 || $data['repeat'] != null) {
            $month = $data['repeat'];
            while ($month >= 0) {
                $this->model->create($data);
                $data['revenue_month'] = date('Y-m-d', strtotime('+1 month', strtotime($data['revenue_month'])));
                --$month;
            }
        } else {
            $this->model->create($data);
        }
        return true;
    }

    public function createRevenueView()
    {
        $clients = Client::all();
        return view('revenue.create', compact('clients'));
    }
    public function createRevenue(CreateUpdateRevenueRequest $request)
    {
        $data = $request->all();
        if ($this->createMoreRevenue($data)) {
            return redirect()->route('revenue.list')->with("success", "Receita cadastrada com sucesso!");
        } else {
            return redirect()->route('revenue.list')->with("error", "Não foi possível cadastrar uma nova receita.");
        }
    }

    public function listRevenueView()
    {
        $revenues = $this->model->all();
        return view('revenue.list', compact('revenues'));
    }

    public function editRevenueView($id)
    {
        $revenue = $this->model->edit($id);
        $clients = Client::all();
        return view('revenue.update', compact('revenue', 'clients'));
    }
    public function updateRevenueView(CreateUpdateRevenueRequest $request, $id)
    {
        $data = $request->all();
        if ($this->model->update($data, $id)) {
            return redirect()->route('revenue.list')->with("info", "Receita atualizada.");
        } else {
            return redirect()->route('revenue.list')->with("error", "Não foi possível atualizar receita.");
        }
    }
    public function deleteRevenue($id)
    {

        if ($this->revenueRepository->delete($id)) {
            return redirect()->route('revenue.list')->with('info', "Receita excluída.");
        } else {
            return redirect()->route('revenue.list')->with('error', "Despesa não excluída.");
        }
    }
}

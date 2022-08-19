<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUpdateRevenueRequest;
use App\Models\Client;
use App\Models\TypeRevenue;
use App\Repositories\RevenueRepository;


class RevenueController extends Controller
{
    protected RevenueRepository $revenueRepository;

    public function __construct(RevenueRepository $revenueRepository)
    {
        $this->revenueRepository = $revenueRepository;
    }

    private function showAllRevenue()
    {
        $this->revenueRepository->all();
        return redirect()->route('revenue.list');
    }

    public function createRevenueView()
    {
        $clients = Client::all();
        $type_revenue = TypeRevenue::all();
        return view('revenue.create', compact('clients', 'type_revenue'));
    }
    public function createRevenue(CreateUpdateRevenueRequest $request)
    {
        $data = $request->all();
        if ($data['repeat'] != 0 || $data['repeat'] != null) {
            $month = $data['repeat'];
            while ($month >= 0) {
                $this->revenueRepository->create($data);
                $data['revenue_month'] = date('Y-m-d', strtotime('+1 month', strtotime($data['revenue_month'])));
                --$month;
            }
        } else {
            $this->revenueRepository->create($data);
        }
        return $this->showAllRevenue();
    }

    public function listRevenueView()
    {
        $revenues = $this->revenueRepository->all();
        return view('revenue.list', compact('revenues'));
    }

    public function editRevenueView($id)
    {
        $revenue = $this->revenueRepository->edit($id);
        $clients = Client::all();
        $type_revenues = TypeRevenue::all();
        return view('revenue.update', compact('revenue', 'clients', 'type_revenues'));
    }
    public function updateRevenueView(CreateUpdateRevenueRequest $request, $id)
    {
        $data = $request->all();
        $this->revenueRepository->update($data, $id);
        return $this->showAllRevenue();
    }
    public function deleteRevenue($id)
    {
        $this->revenueRepository->delete($id);
        return $this->showAllRevenue();
    }
}

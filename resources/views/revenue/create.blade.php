@extends('layouts.template')
@section('title', 'Cadastrar Receita')

@section('body')

    <div class="container d-flex justify-content-center mt-5">
        <h1>Cadastrar Receita</h1>
    </div>

    <div class="container w-50 mt-5">
        <form action="{{ route('revenue.create') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name_revenue" class="form-label">Nome</label>
                <input type="text" name="revenue_name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="revenue_value" class="form-label">Valor</label>
                <input type="number" name="revenue_value" class="form-control" step="0.01">
            </div>

            <div class="mb-3">
                <label for="type_revenue" class="form-label">Tipo de Receita </label>
                <select name="type_revenue" class="form-select">
                    @foreach ($type_revenue as $tRevenue)
                        <option value="{{ $tRevenue->id }}"> {{ $tRevenue->type_revenue }} </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="clients" class="form-label">Cliente </label>
                <select name="clients" class="form-select">
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}"> {{ $client->name }} </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Periodo </label>
                <input type="date" name="revenue_month" class="form-control">
            </div>
            <div class="mb-3">
                <label for="repeat" class="form-label">Repetir nos proximos meses?</label>
                <input type="text" name="repeat" id="repeat" class="form-control" required placeholder="0">
            </div>

            <button type="submit" class="btn btn-outline-dark">Cadastrar Receita</button>
        </form>
    </div>
@endsection

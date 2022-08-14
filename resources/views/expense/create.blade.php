@extends('layouts.template')
@section('title', 'Cadastrar Despesas')

@section('body')

    <div class="container d-flex justify-content-center mt-5">
        <h1>Cadastrar Despesa</h1>
    </div>

    <div class="container w-50 mt-5">
        <form action="{{ route('expense.create') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name_expense" class="form-label">Nome</label>
                <input type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label for="expense" class="form-label">Valor</label>
                <input type="number" class="form-control"  step="0.01">
            </div>

            <div class="mb-3">
                <label for="type_expense" class="form-label">Tipo de Despesa </label>
                <select name="type_expense" class="form-select">
                    @foreach ($type_expense as $tExpense)
                        <option value="{{ $tExpense->id }}"> {{ $tExpense->type_expense }} </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="clients" class="form-label">Cliente </label>
                <select name="clients" class="form-select">
                    @foreach ($clients as $client)
                        <option value=" {{ $client->id }} "> {{ $client->name }} </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Periodo </label>
                <input type="date" class="form-control">
            </div>
{{-- 
            <div class="mb-3">
                <label for="expense_month_label">Repetir nos próximos meses?</label>
                <div class="form-check" name="expense_month_label">
                    <input type="radio" name="expense_month" id="expense_month" value="true">
                    <label class="form-check-label" for="expense_month">Sim</label>
                </div>
                <div class="form-check" name="expense_month_label">
                    <input type="radio" name="expense_month" id="expense_month" value="false">
                    <label class="form-check-label" for="expense_month">Não</label>
                </div>
            </div> --}}

            <button type="submit" class="btn btn-outline-dark">Cadastrar Despesa</button>
        </form>
    </div>
@endsection

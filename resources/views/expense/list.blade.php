@extends('layouts.template')
@section('title', 'Listagem de Despesa')
@section('body')
    <div class="container mt-5 d-flex justify-content-center">
        <h1>Lista de Despesas</h1>
    </div>
    <section class="container-fluid d-flex mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th>Despesa </th>
                    <th>Tipo</th>
                    <th>Valor</th>
                    <th>Data</th>
                    <th>Atualizar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($expenses as $exp)
                    <tr>
                        
                        <td>{{ $exp->expense_name }} </td>
                        <td>{{ $exp->typeExpense->type_expense}}</td>
                        <td>{{ $exp->expense_value }} </td>
                        <td>{{ $exp->expense_month }} </td>
                        <td>
                            <a href="{{ route('expense.edit', $exp->id) }}" class="btn btn-warning ">Atualizar</a>
                        </td>
                        <td>
                            <form action="{{ route('expense.delete', $exp->id) }}" method="get">
                                <button class="btn btn-danger d-inline-block"><a
                                        style="text-decoration: none;">Excluir</a></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection

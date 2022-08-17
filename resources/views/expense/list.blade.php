@extends('layouts.template')
@section('title', 'Listagem de Despesa')
@section('body')
    <section class="container-fluid d-flex mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Despesa </th>
                    <th>Valor</th>
                    <th>Atualizar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($expenses as $exp)
                    <tr>
                        <td> {{ $exp->tb_client_id->name }}</td>
                        <td>{{ $exp->expense_name }} </td>
                        <td>{{ $exp->expense_value }} </td>
                        <td>{{ $exp->expense_month }} </td>
                        {{-- <td>
                            <a href="{{  route('expense.edit', $exp->id)}}" class="btn btn-warning ">Atualizar</a>
                        </td> --}}
                        {{-- <td>
                            <form action="{{ route('expense.type.delete', $exp->id) }}" method="get">
                                <button class="btn btn-danger d-inline-block"><a
                                        style="text-decoration: none;">Excluir</a></button>
                            </form>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection

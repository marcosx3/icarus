@extends('layouts.template')
@section('title', 'Listagem de Receitas')
@section('body')
    <div class="container mt-5 d-flex justify-content-center">
        <h1>Lista de Receitas</h1>
    </div>
    <div class="container d-flex justify-content-center mt-2 mb-2 ">
        @include('message.flash-message')
    </div>
    <section class="container-fluid d-flex mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th>Receita </th>
                    <th>Tipo</th>
                    <th>Valor</th>
                    <th>Data</th>
                    <th>Atualizar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($revenues as $rev)
                    <tr>

                        <td>{{ $rev->revenue_name }} </td>
                        <td>{{ $rev->revenue_type }} </td>
                        <td>{{ $rev->revenue_value }} </td>
                        <td>{{ $rev->revenue_month }} </td>
                        <td>
                            <a href="{{ route('revenue.edit', $rev->id) }}" class="btn btn-warning ">Atualizar</a>
                        </td>
                        <td>
                            <form action="{{ route('revenue.delete', $rev->id) }}" method="get">
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

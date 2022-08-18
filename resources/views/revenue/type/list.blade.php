@extends('layouts.template')
@section('title', 'Listagem de Tipo de Receita')
@section('body')
    <section class="container-fluid d-flex mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th>Tipo de Receita </th>
                    <th>Atualizar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($type_revenues as $te)
                    <tr>
                        <td>{{ $te->type_revenue }} </td>
                        <td>
                            <a href="{{  route('revenue.type.edit', $te->id)   }}" class="btn btn-warning ">Atualizar</a>
                        </td>
                        <td>
                            <form action="{{ route('revenue.type.delete', $te->id) }}" method="get">
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

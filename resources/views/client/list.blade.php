@extends('layouts.template')
@section('title', 'Lista de Clientes')
@section('body')
    <div class="container d-flex justify-content-center mt-5">
        <h1>Lista de Clientes</h1>
    </div>
    <div class="container d-flex justify-content-center mt-2 mb-2 w-100">
        @include('message.flash-message')
    </div>
    <section class="container-fluid d-flex mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th>Cliente </th>
                    <th>Email </th>
                    <th>Telefone </th>
                    <th>Telefone - 2 </th>
                    <th>Finanças</th>
                    <th>Atualizar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr>
                        <td>{{ $client->name }} </td>
                        <td>{{ $client->email }} </td>
                        <td>{{ $client->phone_1 }} </td>
                        <td>{{ $client->phone_2 == null ? 'N/A' : $client->phone_2 }}</td>
                        <td>
                            <a href="{{ route('client.finance', $client->id) }}" class="btn btn-info ">Finanças</a>
                        </td>
                        <td>
                            <a href="{{ route('client.edit', $client->id) }}" class="btn btn-warning ">Atualizar</a>
                        </td>
                        <td>
                            <form action="{{ route('client.delete', $client->id) }}" method="get">
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

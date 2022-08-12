@extends('layouts.template')
@section('title', 'Lista de Clientes')
@section('body')
    <section class="container-fluid d-flex mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th>Cliente </th>
                    <th>Email </th>
                    <th>Telefone </th>
                    <th>Telefone </th>
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
                        <td>{{ $client->phone_2 == null ? 'N/A' : $client->phone_2}}</td>
                        <td>
                            <a href="{{ route('client.edit', $client->id) }}" class="btn btn-warning ">Atualizar</a>
                        </td>
                        {{-- <td>
                            <a href="{{ route('client.deletar', $p->id) }}" class="btn btn-danger ">Excluir</a>
                        </td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection

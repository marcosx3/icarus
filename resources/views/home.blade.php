@extends('layouts.template')
@section('title', 'Página Inicial')
@section('body')
    <div class="container mt-5">
        <h2 class="d-flex justify-content-center">Finanças</h2>
    </div>
    <div class="container mt-2 w-50">
        <form action="{{route('home.clients')}}" method="GET">
            <div class="input-group gap-1">
                {{-- <input type="search" class="form-control " name="search" placeholder="Nome ou Email"/> --}}
                @foreach ($clients as $client)
                    <input type="text" name="name" id="name" value="{{$client->id}}">
                @endforeach
            
            </div>
            <div class="input-group gap-5 mt-4">
                <input type="date" class="form-control"  name="date_finance1"/>
                
                <input type="date" class="form-control" name="date_finance2"/>
                <button type="submit" class="btn btn-outline-primary">Pesquisar</button>
            </div>
            </form>
    </div>
@endsection

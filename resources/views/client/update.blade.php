@extends('layouts.template')
@section('title', 'Atualizar cliente')
@section('body')
    <section class="d-flex justify-content-center mt-4 align-content-end">
        <form action="{{route('client.update',$client->id)}}" method="post" class="form w-75 mt-4" >
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome </label>
                <input type="text" class="form-control" name="name" id="name" value="{{$client->name}}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email </label>
                <input type="email" class="form-control" name="email" id="email" value="{{$client->email}}">
            </div>
            <div class="mb-3">
                <label for="phone_1" class="form-label">Telefone  </label>
                <input type="tel" class="form-control" name="phone_1" id="phone_1" value="{{$client->phone_1}}">
            </div>
            <div class="mb-3">
                <label for="phone_2" class="form-label">Telefone (Opcional) </label>
                <input type="tel" class="form-control" name="phone_2" id="phone_2" value="{{$client->phone_1}}">
            </div>
            <button class="btn btn-dark text-white"type="submit">Atualizar</button>
        </form>
    </section>
@endsection

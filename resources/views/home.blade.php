@extends('layouts.template')
@section('title', 'Página Inicial')
@section('body')

    <section class="container mt-5">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <div class="card shadow border border-primary" >
                    <div class="card-body">
                      <h5 class="card-title">Clientes</h5>
                      <p class="card-text"> {{$clients}} </p>
                    </div>
                  </div>
            </div>
            <div class="col " >
                <div class="card shadow border border-danger" >
                    <div class="card-body">
                      <h5 class="card-title">Total de Despesas</h5>
                      <p class="card-text"> {{$expenses}} </p>
                    </div>
                  </div>
            </div>
            <div class="col " >
                <div class="card shadow border border-success" >
                    <div class="card-body">
                      <h5 class="card-title">Total de Receitas</h5>
                      <p class="card-text"> {{$revenues}} </p>
                    </div>
                  </div>
            </div>
            <div class="col " >
                <div class="card shadow border border-info" >
                    <div class="card-body">
                      <h5 class="card-title"> Total de Geral </h5>
                      <p class="card-text"> {{$revenues - $expenses}} </p>
                    </div>
                  </div>
            </div>
        </div>
    </section>
@endsection

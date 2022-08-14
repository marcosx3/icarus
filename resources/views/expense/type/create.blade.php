@extends('layouts.template')
@section('title','Cadastrar Tipos de Despesas')

@section('body')
  
<div class="container d-flex justify-content-center mt-5">
    <h1>Cadastrar Tipo de Despesa</h1>
</div>
<div class="container w-50 mt-5">
    <form action="" method="post" class="form">
        @csrf
        <div class="mb-3">
            <label for="type_expense" class="form-label">Tipo </label>
            <input type="text" name="type_expense" id="type_expense" class="form-control" placeholder="ex: cartão de crédito">
        </div>
        <button class="btn btn-outline-dark" type="submit">Cadastrar</button>
    </form>
</div>






@endsection
    

@extends('layouts.template')
@section('title','Cadastrar Tipos de Receitas')

@section('body')
  
<div class="container d-flex justify-content-center mt-5">
    <h1>Cadastrar Tipo de Receita</h1>
</div>
<div class="container w-50 mt-5">
    <form action="" method="post" class="form">
        @csrf
        <div class="mb-3">
            <label for="type_revenue" class="form-label">Tipo </label>
            <input type="text" name="type_revenue" id="type_revenue" class="form-control" placeholder="ex: soldo">
        </div>
        <button class="btn btn-outline-dark" type="submit">Cadastrar</button>
    </form>
</div>






@endsection
    

@extends('layouts.template')
@section('title', 'Atualizar Tipo de Despesa')

@section('body')

    <div class="container d-flex justify-content-center mt-5">
        <h1>Atualizar Tipo de Despesa</h1>
    </div>

    <div class="container w-50 mt-5">
        <form action="{{ route('expense.type.update', $te->id) }}" method="post" class="form mt-4">
            @csrf
            <div class="mb-3">
                <label for="type_expense" class="form-label">Tipo </label>
                <input type="text" name="type_expense" id="type_expense" class="form-control"
                    value="{{ $te->type_expense }}">
            </div>
            <button class="btn btn-outline-dark" type="submit">Atualizar</button>
        </form>
    </div>
@endsection

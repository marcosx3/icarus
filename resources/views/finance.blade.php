@extends('layouts.template')
@section('title', 'Finanças')
@section('body')
    <div class="container mt-5 mb-5">
        <?php echo '<h1 class="d-flex justify-content-center">' . $client->name . '</h1>'; ?>
    </div>
    <div class="container mb-2 mt-2">
        <button class="btn btn-warning text-dark" id="btnHideFilter">Filtros</button>
    </div>
    <div class="container mb-3 " id="searchFilter">
        <div>
            <form action="" method="POST">
                @csrf
                <label for="firstDate" class="form-label ">Data Inicio: </label>
                <input type="date" name="firstDate" id="firstDate" class="form-control w-25">
                <label for="secondDate" class="form-label">Data FIM: </label>
                <input type="date" name="secondDate" id="secondDate" class="form-control w-25">

                <button class="btn btn-success text-white mt-2" type="submit">Pesquisar</button>
            </form>
        </div>
    </div>
    <section>
        <div class="container">
            <table class="table table-bordered" id="financeTable">
                <thead>
                    <tr>
                        <th>Despesa</th>
                        <th>Tipo</th>
                        <th>Valor</th>
                        <th>Mês</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $totalExpenses = 0.0; ?>
                    @foreach ($exp as $exp)
                        <tr>
                            <td> {{ $exp->expense_name }}</td>
                            <td> {{ $exp->expense_type }}</td>
                            <td> {{ $exp->expense_value }}</td>
                            <td> {{ $exp->expense_month }}</td>
                        </tr>
                        <?php $totalExpenses += $exp->expense_value; ?>
                    @endforeach
                </tbody>
                <tfoot style="color: red">
                    <td colspan="3">Total de Despesas</td>
                    <td> <?php echo 'R$ ' . $totalExpenses; ?></td>
                </tfoot>
            </table>
        </div>
        <div class="container">
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>Receita</th>
                        <th>Tipo</th>
                        <th>Valor</th>
                        <th>Mês</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $totalRevenues = 0.0; ?>
                    @foreach ($rev as $rev)
                        <tr>
                            <td> {{ $rev->revenue_name }}</td>
                            <td> {{ $rev->revenue_type }}</td>
                            <td> {{ $rev->revenue_value }}</td>
                            <td> {{ $rev->revenue_month }}</td>
                        </tr>
                        <?php $totalRevenues += $rev->revenue_value; ?>
                    @endforeach
                </tbody>
                <tfoot style="color: green">
                    <td colspan="3">Total de Receitas</td>
                    <td> <?php echo 'R$ ' . $totalRevenues; ?></td>
                </tfoot>
            </table>
        </div>
        <div class="container d-flex justify-content-center">
            <?php 
                $totalGeral = $totalRevenues - $totalExpenses
            ?>
            @if ($totalGeral >= 0)
            <h1 style="color: blue"> TOTAL GERAL R$ {{ $totalGeral  }}</h1>
            @else
            <h1 style="color: red" step="0.2"> TOTAL GERAL R${{ $totalGeral  }}</h1>
            @endif
          
        </div>
      
    </section>
@endsection

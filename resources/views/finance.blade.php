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
                        @if ($firstDate && $secondDate)
                            {{-- <th>Tipo</th> --}}
                        @else
                            <th>Tipo</th>
                        @endif
                        <th>Valor</th>
                        <th>Mês</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $totalExpenses = 0.0; ?>
                    @foreach ($exp as $exp)
                        <tr>
                            <td> {{ $exp->expense_name }}</td>
                            @if ($firstDate && $secondDate)
                                {{-- <td> {{ $exp->typeExpense->type_expense }}</td> --}}
                            @else
                                <td> {{ $exp->typeExpense->type_expense }}</td>
                            @endif
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
                        @if ($firstDate && $secondDate)
                            {{-- <th>Tipo</th> --}}
                        @else
                            <th>Tipo</th>
                        @endif
                        <th>Valor</th>
                        <th>Mês</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $totalRevenues = 0.0; ?>
                    @foreach ($rev as $rev)
                        <tr>
                            <td> {{ $rev->revenue_name }}</td>
                            @if ($firstDate && $secondDate)
                                {{-- <td> {{ $rev->typeRevenue->type_revenue }}</td> --}}
                            @else
                                <td> {{ $rev->typeRevenue->type_revenue }}</td>
                            @endif
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
        <h1> TOTAL GERAL {{$totalExpenses =  $totalRevenues - $totalExpenses}}</h1>
    </section>
@endsection

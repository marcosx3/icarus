@extends('layouts.template')
@section('title', 'Finanças')
@section('body')
    <div class="container mt-5 mb-5">
        <h1 class="d-flex justify-content-center">Finanças</h1>
    </div>

    <div class="container">
        <table class="table table-bordered ">
            <thead>
                <tr>
                    <th>Despesa</th>
                    <th>Tipo</th>
                    <th>Valor</th>
                    <th>Mês</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php $totalExpenses = 0.0;?>
                @foreach ($exp as $exp)
                    <tr>
                        <td> {{ $exp->expense_name }}</td>
                        <td> {{ $exp->typeExpense->type_expense }}</td>
                        <td> {{ $exp->expense_value }}</td>
                        <td> {{ $exp->expense_month}}</td>
                    </tr>
                    <?php $totalExpenses += $exp->expense_value ?>
                @endforeach
            </tbody>
            <tfoot style="color: red">
              <td colspan="3">Total de Despesas</td>
              <td > <?php echo 'R$ ' .  $totalExpenses ?></td>
            </tfoot>
        </table>
    </div>
    <div class="container">
        <table class="table table-bordered ">
            <thead>
                <tr>
                    <th>Receita</th>
                    <th>TIpo</th>
                    <th>Valor</th>
                    <th>Mês</th>
                </tr>
            </thead>
            <tbody>
                <?php $totalRevenues = 0.0;?>
                @foreach ($rev as $rev)
                    <tr>
                        <td> {{ $rev->revenue_name }}</td>
                        <td> {{ $rev->typeRevenue->type_revenue }}</td>
                        <td> {{ $rev->revenue_value }}</td>
                        <td> {{ $rev->revenue_value }}</td>
                    </tr>
                    <?php $totalRevenues += $rev->revenue_value ?>
                @endforeach
            </tbody>
            <tfoot style="color: green">
                <td colspan="3">Total de Receitas</td>
                <td > <?php echo 'R$ ' .  $totalRevenues ?></td>
              </tfoot>
        </table>
    </div>
@endsection
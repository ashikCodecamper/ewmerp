@extends('layouts.apps')
@section('module-name','Account')
@section('stylesheet')
	<!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
@endsection

@section('content')

	<div class="row">
		
        <div class="col-sm-6">
            <h5>Party</h5>
             <ul>
                <li><a href="{{route('party.index')}}">Party dashboard</a></li>
            </ul>
        </div>

        <div class="col-sm-6">
            <h5>Balance</h5>
            <ul>
                <li><a href="{{route('balance.index')}}">Balance dashboard</a></li>
                <li><a href="{{route('balanceexpense')}}">Balance expense </a></li>
                <li><a href="{{route('balanceexpenseReportshow')}}">Balance expense report </a></li>
            </ul>
        </div>

        <div class="col-sm-6">
            <h5>Bank</h5>
            <ul>
                <li><a href="{{route('bank.index')}}">bank</a></li>
                <li><a href="{{ route('bankbalance.index') }}">bank balance</a></li>
            </ul>
        </div>

        <div class="col-sm-6">
            <h5>Account Head and subhead</h5>
            <ul>
                <li><a href="{{ route('accounthead.index') }}">Account Head </a></li>
                <li><a href="{{ route('accountsubhead.index') }}">Account Sub Head</a></li>
            </ul>
        </div>

        <div class="col-sm-6">
            <h5>Expense And Payable Expense</h5>
            <ul>
                <li><a href="{{route('expense.index')}}">Expense</a></li>
                <li><a href="{{route('payable.index')}}">Payable Expense</a></li>
            </ul>
        </div>
            
	</div>



@endsection
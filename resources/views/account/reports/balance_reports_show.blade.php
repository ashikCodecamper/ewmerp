
@extends('layouts.apps')
@section('module-name','Date wise expense report')
@section('stylesheet')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        .icon-red{
            color:  #f44336;
        }
    </style>
@endsection
@section('content')

{{-- 
<html>
	<head>
		<style>
			#cell {
			    background-color: #000000;
			    color: #ffffff;
			}

			.cell {
			    background-color: #000000;
			    color: #ffffff;
			}
      .b {
        border: 1px solid black;
      }
			tr td {
			    background-color: #ffffff;
			}

			tr > td {
			    border-bottom: 1px solid #000000;
			}
		</style>
	</head>

<table>
  <tr>
    <td class="b" style="width: 127px;"> <strong>Date</strong></td>
    <td class="b" style="background-color: #000000;"> <strong>Description</strong></td> 
    <td class="b" style="background-color: #000000;"> <strong>Amount</strong></td>
  </tr>
  
  @foreach($s as $row)
  	<tr>
  		<td class="cell">{{$row['date']}}</td>
  		<td class="cell">{{$row['description']}}</td>
  		<td>{{$row['amount']}}</td>
  	</tr>
  @endforeach
  	<tr>
  		<td class="cell"></td>
  		<td>total</td>
  		<td>{{$total}}</td>
 	</tr>
</table>

</html>
--}}

 <div class="row">
        <table class="highlight bordered z-depth-3 striped">

            <thead>
            <tr class="teal lighten-2">
                <th>Date</th>
                <th>Description</th>
                <th>Amount</th>
            </tr>
            </thead>


            <tbody>

                @foreach($r as $party)
                <tr>
                    <td>{{$party->date}}</td>
                    <td>{{$party->description}}</td>
                    <td>{{number_format($party->amount)}}</td>
                </tr>
                @endforeach
                   <tr>
                    <td></td>
                    <td>Total</td>
                    <td>{{number_format($party->sum('amount'))}}</td>
                </tr>
            </tbody>
        </table>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

@endsection
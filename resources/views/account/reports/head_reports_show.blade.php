{{--<html>
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
    <td class="b" style="width: 127px;"> <strong>Head Name</strong></td> 
    <td class="b" style="background-color: #000000;"> <strong>total</strong></td>
  </tr>
  
  @foreach($data as $row)
  	<tr>
  		<td class="cell">{{$row[0]->head->name}}</td>
      <td>{{ $row->sum('expense_amount') }}</td>
  	</tr>
  @endforeach
  <tr>
      <td class="cell">total</td>
      <td>{{ $allsum}}</td>
    </tr>
</table>

</html>--}}


@extends('layouts.apps')
@section('module-name','Head Wise Expense Report')
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

    <div class="row">
        <table class="highlight bordered z-depth-3 striped">

            <thead>
            <tr class="teal lighten-2">
                <th>Sr</th>
                <th>Party Name</th>
                <th>Head Of Account</th>
                <th>Sub Head of Account</th>
                <th>Particulars</th>
                <th>Details Description</th>
                <th>Expense Amount</th>
            </tr>
            </thead>


            <tbody>

                @foreach($r as $key => $party)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$party->party->party_name}}</td>
                    <td>{{$party->head->name}}</td>
                    @if($party->subhead)
                        <td>{{$party->subhead->description}}</td>
                    @endif
                    <td>{{$party->particulars}}</td>
                    <td>{{$party->details_description}}</td>
                    <td>{{number_format($party->expense_amount)}}</td>
                </tr>
                @endforeach
                   <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total</td>
                    <td>{{number_format($r->sum('expense_amount'))}}</td>
                </tr>
            </tbody>
        </table>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

@endsection


@section('javascript')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <script type="text/javascript">

        $(document).ready(function() {
            $('#date-picker').daterangepicker({locale: {
                    format: 'YYYY-MM-DD',
                    startView: "years",
                }, singleDatePicker: true, "showDropdowns": true, }, function(start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
        });

    </script>
@endsection

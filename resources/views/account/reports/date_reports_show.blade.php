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
    <td><strong>Date</strong></td>
    <td><strong>Account Head</strong></td>
    <td><strong>Account SubHead</strong></td>
    <td><strong>Particular Head</strong></td>
    <td><strong>Voucher No</strong></td>
    <td><strong>Details Description</strong></td>
    <td><strong>Expenses</strong></td>
  </tr>
  @foreach($s as $row)
  	<tr>
  		<td class="cell">{{$row['recording_date']}}</td>
  		<td class="cell">{{$row->head->name}}</td>
      @if($row->subhead)
        <td class="cell">{{$row->subhead->name}}</td>
        @else
        <td></td>
      @endif
  		<td>{{$row['particulars']}}</td>
  		<td>{{$row['voucher_no']}}</td>
  		<td>{{$row['details_description']}}</td>
  		<td>{{$row['expense_amount']}}</td>
  	</tr>
  @endforeach
  	<tr>
  		<td class="cell"></td>
  		<td class="cell"></td>
  		<td></td>
  		<td></td>
      <td></td>
  		<td>total</td>
  		<td>{{$total}}</td>
 	</tr>
</table>

</html>--}}

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
                    @if($party->party)
                    <td>{{$party->party->party_name}}</td>
                    @else
                    <td>unknown</td>
                    @endif
                    @if($party->head)
                    <td>{{$party->head->name}}</td>
                    @else
                    <td>unknown</td>
                    @endif
                    @if($party->subhead)
                        <td>{{$party->subhead->name}}</td>
                    @else
                        <td>unknown</td>
                    @endif
                    @if($party->particulars)
                    <td>{{$party->particulars}}</td>
                    @else
                    <td>no particulars</td>
                    @endif
                    @if($party->details_description	)
                    <td>{{$party->details_description}}</td>
                    @else
                    <td>no description</td>
                    @endif
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

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
    <td><strong>Date</strong></td>
    <td><strong>Account Head</strong></td>
    <td><strong>Account SubHead</strong></td>
    <td><strong>Particular Head</strong></td>
    <td><strong>Voucher No</strong></td>
    <td><strong>Details Description</strong></td>
    <td><strong>Expenses</strong></td>
  </tr>

  @foreach($data as $row)
  	<tr>
  		<td>{{ $loop->iteration }}</td>
  		<td class="cell">{{$row[0]->head->name}}</td>
	    <td><strong>subheads</strong></td>
	    <td><strong></strong></td>
	    <td><strong></strong></td>
	    <td><strong></strong></td>
	    <td><strong>{{ $row->sum('expense_amount') }}</strong></td>
	 </tr>

	 @foreach($row as $r)
	 <tr>
  		<td class="cell">{{$r['recording_date']}}</td>
  		<td class="cell"></td>
      @if($r->subhead)
        <td class="cell">{{$r->subhead->name}}</td>
        @else
        <td></td>
      @endif
  		<td>{{$r['particulars']}}</td>
  		<td>{{$r['voucher_no']}}</td>
  		<td>{{$r['details_description']}}</td>
  		<td>{{$r['expense_amount']}}</td>
  	</tr>
	 @endforeach
  @endforeach
  <tr>
	    <td><strong></strong></td>
	    <td><strong></strong></td>
	    <td><strong></strong></td>
	    <td><strong></strong></td>
	    <td><strong></strong></td>
	    <td><strong>Total cost</strong></td>
	    <td><strong>{{ $allsum }}</strong></td>
  </tr>
</table>

</html>--}}


@extends('layouts.apps')
@section('module-name','Head wise expense report')
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
			<tr>
			    <td><strong>Date</strong></td>
			    <td><strong>Account Head</strong></td>
			    <td><strong>Account SubHead</strong></td>
			    <td><strong>Particular Head</strong></td>
			    <td><strong>Voucher No</strong></td>
			    <td><strong>Details Description</strong></td>
			    <td><strong>Expenses</strong></td>
			</tr>

			 @foreach($data as $row)
			  	<tr>
					  <td>{{ $loop->iteration }}</td>
					  @if($row[0]->head)
					  <td class="cell">{{$row[0]->head->name}}</td>
					  @else
					  <td>unknown</td>
					  @endif
				    <td><strong>subheads</strong></td>
				    <td><strong></strong></td>
				    <td><strong></strong></td>
				    <td><strong></strong></td>
				    <td><strong></strong></td>
				 </tr>

				@foreach($row as $r)
				<tr>
			  		<td class="cell">{{$r['recording_date']}}</td>
			  		<td class="cell"></td>
			     	@if($r->subhead)
			        	<td class="cell">{{$r->subhead->name}}</td>
			        @else
			        	<td></td>
			      	@endif
			  		<td>{{$r['particulars']}}</td>
			  		<td>{{$r['voucher_no']}}</td>
			  		<td>{{$r['details_description']}}</td>
			  		<td>{{number_format($r['expense_amount'])}}</td>
			  	</tr>
				 @endforeach
			  @endforeach
			  <tr>
				    <td><strong></strong></td>
				    <td><strong></strong></td>
				    <td><strong></strong></td>
				    <td><strong></strong></td>
				    <td><strong></strong></td>
				    <td><strong>Total cost</strong></td>
				    <td><strong>{{ number_format($row->sum('expense_amount')) }}</strong></td>
			  </tr>
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

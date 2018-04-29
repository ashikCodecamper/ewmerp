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
    <tr>
      <td><strong>AccountHead</strong></td>
      <td><strong></strong></td>
      <td><strong></strong></td>
      <td><strong></strong></td>
      <td><strong></strong></td>
      <td><strong></strong></td>
      @if ($data[0]->head)
      <td><strong>{{ $data[0]->head->name }}</strong></td>
      @else
      <td><strong>unknown</strong></td>
      @endif
    </tr>
      @foreach($data as $row)
        <tr>
          <td>{{$row->recording_date}}</td>
          <td></td>
          <td>{{$row->subhead->name}}</td>
          <td>{{$row->particulars}}</td>
          <td>{{$row->voucher_no}}</td>
          <td>{{$row->details_description}}</td>
          <td>{{number_format($row->expense_amount)}}</td>
        </tr>
      @endforeach
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td>total</td>
          <td>{{ number_format($data->sum('expense_amount')) }}</td>
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

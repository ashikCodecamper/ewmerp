@extends('layouts.apps')
@section('module-name','Account')
@section('stylesheet')<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        .icon-red{
            color: #f44336;
        }
    </style>
@endsection
@section('content')

    <div class="row">
        <a class="waves-effect waves-light btn" href="{{ route('bankbalance.create') }}">create bank balance</a>
        <table class="highlight bordered z-depth-3 centered">

            <thead>
           
            <tr class="teal lighten-2">
                <th>Date</th>
                <th>Description</th>
                <th>Ref No.</th>
                <th>Received</th>
                <th>Withdrawn</th>
                <th>Current Balance</th>
                <th>Action</th>
            </tr>
            </thead>


            <tbody>

                @foreach($bankbalance as $bank)
                <tr>
                    <td>{{$bank->Date}}</td>
                    <td>{{$bank->description}}</td>
                    <td>{{$bank->ref_no}}</td>
                    <td>{{number_format($bank->money_received)}}</td>
                    <td>{{number_format($bank->money_withdrawn)}}</td>
                    @if($bank->money_received)
                        <td>{{ number_format($cbalance += $bank->money_received) }}</td>
                    @else
                        <td>{{ number_format($cbalance -= $bank->money_withdrawn) }}</td>
                    @endif
                    
                    <td>
                        <a href="{{route('bankbalance.edit', ['id'=>$bank->id])}}"> <i class="small material-icons">edit</i> </a>
                        <a href="{{route('bankbalance.delete', ['id' => $bank->id])}}"> <i class="small material-icons icon-red">delete</i> </a>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>final Balance</td>
                    <td>{{ number_format($cbalance)}}</td>
                    <td></td>
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

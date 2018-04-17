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
        <table class="highlight bordered z-depth-3 centered">

            <thead>
            <tr class="teal lighten-2">
                <th>Date</th>
                <th>Received</th>
                <th>Withdrawn</th>
                <th>Description</th>
                <th>Current Balance</th>
            </tr>
            </thead>


            <tbody>
                <tr>
                    <td>Opening Balance</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{ number_format($openning)}}</td>

                </tr>
                @foreach($finals as $final)
                    <tr>
                    <td>{{$final->date}}</td>
                    @if(isset($final->amount_received))
                    <td>{{number_format($final->amount_received)}}</td>
                    @else
                    <td>0</td>
                    @endif
                    @if(isset($final->amount_paid))
                    <td>{{number_format($final->amount_paid)}}</td>
                    @else
                    <td>0</td>
                    @endif
                    @if(isset($final->description))
                    <td>{{$final->description}}</td>
                    @else
                    <td>0</td>
                    @endif
                    <?php 
                        if(isset($final->amount_received)) {
                            $openning += $final->amount_received;
                        }
                        if (isset($final->amount_paid)) {
                            $openning -= $final->amount_paid;
                        }
                    ?>
                    <td>{{number_format($openning)}}</td>
                    </tr>
                    
                @endforeach
                <tr>
                    <td>closing Balance</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{ number_format($openning)}}</td>

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

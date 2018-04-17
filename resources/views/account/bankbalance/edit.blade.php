@extends('layouts.apps')
@section('module-name','Account')
@section('stylesheet')<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection
@section('content')


    <div class="row">
        <form class="col s12" method="post" action="{{route('bankbalance.update', ['id'=>$bankbalance->id])}}">
            {{csrf_field()}}
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">business</i>
                    <input value="{{ $bankbalance->description }}" name="description" id="icon_prefix" type="text" class="validate" required>
                    <label for="icon_prefix">Description</label>
                </div>

                <div class="input-field col s6">
                    <i class="material-icons prefix">business</i>
                    <input value="{{ $bankbalance->ref_no }}" name="ref_no" id="icon_prefix" type="text" class="validate" required>
                    <label for="icon_prefix">Ref No</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">email</i>
                    <input value="{{ $bankbalance->money_received }}" name="money_received" id="icon_prefix" type="text" class="validate">
                    <label for="icon_prefix">Money Received</label>
                </div>

                <div class="input-field col s6">
                    <i class="material-icons prefix">account_balance</i>
                    <input value="{{ $bankbalance->money_withdrawn }}" name="money_withdrawn" id="icon_prefix" type="text" class="validate">
                    <label for="icon_prefix">Money Withdrawn</label>
                </div>
            </div>

            <div class="row">
                 <div class="input-field col s4 ">
                    <i class="material-icons prefix icon-blue">date_range</i>
                    <input value="{{ $bankbalance->date }}" class="datepicker" name="date" id="icon_prefix" type="text" class="validate" required>
                    <label for="icon_prefix">Date</label>
                </div>
                <div class="input-field col s6">
                    <button class="btn btn-large btn-register waves-effect waves-light" type="submit">save
                        <i class="material-icons right">done</i>
                    </button>
                </div>
            </div>

        </form>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

@endsection


@section('javascript')
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<script type="text/javascript">
  
  $(document).ready(function() {
     $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15, // Creates a dropdown of 15 years to control year,
            today: 'Today',
            clear: 'Clear',
            close: 'Ok',
            closeOnSelect: true,
            format: 'yyyy-mm-dd' 
        });
});

</script>
@endsection

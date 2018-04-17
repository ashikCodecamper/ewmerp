@extends('layouts.apps')
@section('module-name','Account')
@section('stylesheet')<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection
@section('content')

<div class="row">
        <form class="col l12" method="post" action="{{route('expense.update', ['id'=>$expense->id])}}">
            {{csrf_field()}}
            <div class="row">
                <div class="input-field col s4 ">
                    <i class="material-icons prefix icon-blue">date_range</i>
                    <input value="{{ $expense->recording_date }}" class="datepicker" name="recording_date" id="icon_prefix" type="text" class="validate" required>
                    <label for="icon_prefix">Recording Date</label>
                </div>

                <div class="input-field col s4">
                    <i class="material-icons prefix">date_range</i>
                    <input value="{{ $expense->invoice_date }}"  class="datepicker1" name="invoice_date" id="icon_prefix" type="text" class="validate" required>
                    <label for="icon_prefix">Invoice Date</label>
                </div>
            </div>


            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">description</i>
                    <input value="{{ $expense->voucher_no }}"  name="voucher_no" id="icon_prefix" type="text" class="validate" required>
                    <label for="icon_prefix">Voucher No</label>
                </div>

                <div class="input-field col s6">
                    <i class="material-icons prefix">description</i>
                    @if($expense->particulars)
                    <input value="{{ $expense->particulars }}" name="particulars" id="icon_telephone" type="text" class="validate" required>
                    @else
                    <input name="particulars" id="icon_telephone" type="text" class="validate" required>
                    @endif                    
                    <label for="icon_telephone">Particulars</label>
                </div>
            </div>

            <div class="row">
               <div class="input-field col s6">
                    <i class="material-icons prefix">description</i>
                    <select name="head">
                      @if($expense->head)
                        <option value="{{ $expense->head->id }}" selected>{{ $expense->head->name }}</option>
                        @foreach($heads as $h)
                        @if($h->id != $expense->head->id)
                            <option value="{{ $h->id }}">{{ $h->name }}</option>
                        @endif
                        @endforeach
                      @else
                      @foreach($heads as $h)
                        <option value="{{ $h->id }}">{{ $h->name }}</option>
                     @endforeach
                     @endif

                     
                    </select>
                    <label>Account Head</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">account_circle</i>
                    <select name="party">
                        @if ($expense->party)
                            <option value="{{ $expense->party->id }}" selected>{{ $expense->party->party_name }}</option>
                            @foreach($parties as $p)
                                @if($p->id != $expense->party->id)
                                    <option value="{{ $p->id }}">{{ $p->party_name }}</option>
                                @endif
                            @endforeach
                        @else
                            @foreach($parties as $p)
                            <option value="{{ $p->id }}">{{ $p->party_name }}</option>
                            @endforeach
                        @endif
                    
                    </select>
                    <label>Party</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">email</i>
                    @if($expense->details_description)
                        <input value="{{ $expense->details_description }}" name="details_description" id="icon_prefix" type="text" class="validate" required>
                    @else
                    <input name="details_description" id="icon_prefix" type="text" class="validate" required>
                    @endif
                    <label for="icon_prefix">Details Description</label>
                </div>

                <div class="input-field col s6">
                    <i class="material-icons prefix">attach_money</i>
                    <select name="payment_type">
                      <option value="{{ $expense->mode_of_payment }}" selected>{{ $expense->mode_of_payment }}</option>
                      @if($expense->mode_of_payment == "cash")
                        <option value="cheque">Cheque</option>
                      @else
                        <option value="cash">Cash</option>
                      @endif    
                    </select>
                    <label>Payment type</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">email</i>
                    <input value="{{ $expense->cheque_no }}" name="cheque_no" id="icon_prefix" type="text" class="validate" required>
                    <label for="icon_prefix">Cheque No</label>
                </div>

                <div class="input-field col s6">
                   <i class="material-icons prefix">attach_money</i>
                    <input value="{{ $expense->expense_amount }}" name="amount" id="icon_prefix" type="text" class="validate" required>
                    <label for="icon_prefix">Ammount</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <button class="btn btn-small btn-register waves-effect waves-light" type="submit">save
                        <i class="material-icons right">done</i>
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection


@section('javascript')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script type="text/javascript">

       $(document).ready(function() {
            $('select').material_select();
        });
         $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15, // Creates a dropdown of 15 years to control year,
            today: 'Today',
            clear: 'Clear',
            close: 'Ok',
            closeOnSelect: true,
            format: 'yyyy-mm-dd' 
        });

        $('.datepicker1').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15, // Creates a dropdown of 15 years to control year,
            today: 'Today',
            clear: 'Clear',
            close: 'Ok',
            closeOnSelect: true,
            format: 'yyyy-mm-dd' 
        });
    </script>
@endsection

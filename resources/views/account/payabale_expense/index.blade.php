@extends('layouts.apps')
@section('module-name','Account')
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

<div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
        <form id = "editForms" class="col s12" method="post" action="">
            {{csrf_field()}}
            <div class="row">
               <div class="input-field col s6 required">
                    <i class="material-icons prefix">description</i>
                    <select id="payment_type" name="payment_type">
                      <option value="" disabled selected>Choose payment type</option>
                      <option value="cash">cash</option>
                      <option value="cheque">cheque</option>
                    </select>
                    <label>Payment type</label>
                </div>

                 <div id="ch" class="input-field col s6">
                    <i class="material-icons prefix">email</i>
                    <input name="cheque_no" id="icon_prefix" type="text" class="validate">
                    <label for="icon_prefix">Cheque No</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <button class="btn btn-large btn-register waves-effect waves-light" type="submit">save
                        <i class="material-icons right">done</i>
                    </button>
                </div>
            </div>
        </form>
    </div>
     <div class="modal-footer">
      <button id="close" class="modal-action icon-redd modal-close waves-effect waves-effect waves-light btn">Close</button>
    </div>
  </div>

    <div class="row">
        <a class="waves-effect waves-light btn" href="{{ route('payable.create') }}">create payable expense</a>
        <table class="highlight bordered z-depth-3 striped">

            <thead>
            <tr class="teal lighten-2">
                <th>Sr</th>
                <th>Party Name</th>
                <th>Head Of Account</th>
                <th>SubHead Of Account</th>
                <th>Particulars</th>
                <th>Details Description</th>
                <th>Expense Amount</th>
                <th>Action</th>
            </tr>
            </thead>


            <tbody>

                @foreach($expenses as $key => $party)
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
                        <td>{{$party->subhead->description}}</td>
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
                    <td>
                        <a id= "{{ $party->id }}" class="modal-trigger pay" href="#modal1"><i class="small material-icons">beenhere</i></a>
                        <a href="{{route('payable.edit', ['id'=>$party->id])}}"> <i class="small material-icons">edit</i> </a>
                        <a href="{{route('payable.delete', ['id'=>$party->id])}}"> <i class="small material-icons icon-red">delete</i> </a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>



    

@endsection


@section('javascript')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function() {
            $('#date-picker').daterangepicker({locale: {
                    format: 'YYYY-MM-DD',
                    startView: "years",
                }, singleDatePicker: true, "showDropdowns": true, }, function(start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });

            $("#ch").hide();

            $('select').material_select();

            $("#payment_type").on('change', function() {
                    if ($(this).val() == "cheque") {
                         $("#ch").show();
                    }
                    else {
                        $("#ch").hide();    
                    }
            });

             $('.pay').click(function(){

                    var id = this.id;
                    
                    var url = 'pay/'+id;

                    $("#editForms").attr('action', url);


                    $("#close").click(function(){

                            $('#modal1').modal('close');
                    });

                    $('.modal').modal({
                      dismissible: false, // Modal can be dismissed by clicking outside of the modal
                      opacity: .5, // Opacity of modal background
                      inDuration: 400, // Transition in duration
                      outDuration: 400, // Transition out duration
                      startingTop: '4%', // Starting top style attribute
                      endingTop: '10%', // Ending top style attribute
                      ready: function(modal, trigger) {
                           
                      },
                      //complete: function() { alert('Closed'); } // Callback for Modal close
                });
            })
        });

    </script>
@endsection

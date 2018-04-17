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
        .icon-redd{
            background-color: #f44336;
        }
        
    </style>
@endsection
@section('content')

    

 <div id="modal2" class="modal modal-fixed-footer">
    <div class="modal-content">
        <form id = "editForme" class="col s12" method="post" action="{{ route('accountsubhead.store') }}">
            {{csrf_field()}}

            <div class="row">
               
                <div class="input-field col s6">
                    <select name="head">
                      <option value="" disabled selected>Choose Account Head</option>
                      @foreach($aheads as $h)
                        <option value="{{ $h->id }}">{{ $h->name }}</option>
                      @endforeach
                    </select>
                    <label>Account Head</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">description</i>
                    <input placeholder="Placeholder" name="description" id="icon_prefix2" type="text" class="validate" required>
                    <label for="icon_prefix2">Description</label>
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


 <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
        <form id = "editForms" class="col s12" method="post" action="">
            {{csrf_field()}}
            <div class="row">
                <div class="input-field col s6">
                    <select name="heads" id="head">
                      @foreach($aheads as $h)
                        <option value="{{ $h->id }}">{{ $h->name }}</option>
                      @endforeach
                    </select>

                    <label>Account Head</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">description</i>
                    <input placeholder="Placeholder" name="description" id="icon_prefix2" type="text" class="validate" required>
                    <label for="icon_prefix2">Description</label>
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
            <div class="row">
                <div class="left">
                   <a class="modal-trigger e waves-effect waves-light btn-large" href="#modal2">Add Sub New Head</a>
                </div>
            </div>
     

        <table class="highlight bordered z-depth-3">

            <thead>
            <tr class="teal lighten-2">
                <th>Sr</th>
                <th>Account Head Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            </thead>


            <tbody>

                @foreach($heads as $key => $head)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$head->head->name}}</td>
                    <td>{{$head->description}}</td>
                    <td>
                        <a id= "{{ $head->id }}" class="modal-trigger s" href="#modal1"><i class="small material-icons">edit</a>
                        <a href="{{route('accountsubhead.delete', ['id'=>$head->id])}}"> <i class="small material-icons icon-red">delete</i> </a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

 <!-- Modal Trigger -

  <!-- Modal Structure -->
 

   

@endsection


@section('javascript')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function() {
            
               
                $('select').material_select();
                 $('.s').click(function(){

                    var id = this.id;
                    
                    var url = 'accountsubhead/'+id+"/edit";
                    
                    $("#editForms").attr('action', url);

                    $.ajax({
                            url: "{{route('sbalance.json')}}",
                            dataType: 'text',
                            
                            data: {
                                "_token": "{{ csrf_token() }}",
                                id: id
                            },
                            success: function (msg) {
                                var a = msg.substr(1,);
                                var b = JSON.parse(a);
                                
                                $('#head').val(b.balance.head_id);
                                $('select').material_select();
                                $('#modal1 #icon_prefix2').val(b.balance.description);
                               
                            },
                            complete: function () {
                                
                            }
                    });

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

                   $('.e').click(function(){
                    $('select').material_select();
                    $("#close").click(function(){

                            $('#modal2').modal('close');
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

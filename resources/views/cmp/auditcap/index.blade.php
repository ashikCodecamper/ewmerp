@extends('layouts.apps')
@section('module-name','Development Critical Path')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">

                <div class="box-header">
                    <h3 class="box-title">AuditCaps Detais for smeta zc - {{$caps[0]->audit->smeta->smetaZcNumber }}
                    on supplier - {{$caps[0]->audit->smeta->supplier->name}}</h3>

                    <div class="box-tools" style="float:right;">
                        <a href="{{route('cmpHome')}}"><button type="buton" class="btn bg-purple btn-lg" ><strong>compliance list</strong></button></a>
                    </div>
                    <hr>
                </div>


                <div class="box-body no-padding">
                    <table class="table">
                        <tr>
                            <th>No</th>
                            <th>Description</th>
                            <th>timeline</th>
                            <th>validation by third party</th>
                            <th>comments</th>
                        </tr>
                        @if(!empty($caps))
                            @foreach($caps as $key => $cap)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$cap->description}}</td>
                                    <td>{{$cap->timeline}}</td>
                                    @if($cap->validationByThirdParty)
                                        <td> {{"yes"}}</td>
                                    @else
                                        <td>{{"no"}}</td>
                                    @endif
                                    <td>{{$cap->comments}}</td>
                                  {{--  <td class="text-right">
                                        <a href="{{route('dcpsteponedit',$supplier->id)}}"><span class="btn label-warning">Edit</span></a>
                                        <form  action="{{route('dcpdestroy',$supplier->id)}}" method="post" style="display:inline-block" id="form2">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="DELETE" id="form1">
                                            <input class="btn label-danger" type="submit" value="Delete">
                                        </form>

                                    </td>--}}
                                </tr>
                            @endforeach
                        @endif
                    </table>
                </div>
                <button class="btn-blue" id="add">Add a cap</button>
                <button class="btn-blue"><a href="{{route('alliance.create', ['id'=>$caps[0]->audit->smeta->supplier->id])}}">fillup alliance</a></button>

                <form id="cap" class="" method="post" action="{{route('auditcapStore',$caps[0]->audit->smeta->supplier->id)}}" enctype="multipart/form-data" data-parsley-validate>
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-3">

                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" name="cap_description" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-3">

                            <div class="form-group">
                                <label>TimeLine</label>
                                <input type="text" name="cap_timeline" class="form-control" value="" id="date-picker">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck2" name="cap_valid">
                                <label class="form-check-label" for="exampleCheck2">validation by third party</label>
                            </div>
                        </div>

                        <div class="col-md-3">

                            <div class="form-group">
                                <label>comments</label>
                                <input type="text" name="smeta_cap" class="form-control" value="" >
                            </div>
                        </div>
                        <div class="row"><div class="col-md-4"><input type="submit" name="" class="btn btn-success" value="Save"></div></div>
                    </div>

                    </div>

                </form>
        </div>
    </div>
    </div>




    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <script>
        $(document).ready(function() {

            $('#cap').hide(); //Initially form wil be hidden.

            $('#add').click(function() {
                $('#cap').show();//Form shows on button click
                $('#date-picker').daterangepicker({locale: {
                        format: 'YYYY-MM-DD',
                        startView: "years",
                    }, singleDatePicker: true, "showDropdowns": true, }, function(start, end, label) {
                    console.log(start.toISOString(), end.toISOString(), label);
                });

            });



        });
    </script>
@endsection


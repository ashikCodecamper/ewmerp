@extends('layouts.apps')
@section('module-name','Compliance')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Suppliers</h3>

          <div class="box-tools" style="float:right;">
              <a href="{{route('supplierCreate')}}"><button type="buton" class="btn bg-purple btn-lg" ><strong>Add New Supplier<strong></button></a>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <table class="table">
            <tr>
              <th>Supplier no</th>
              <th>Supplier Name</th>
              <th>Managing Director</th>
              <th>Supplier Corporate Office</th>
              <th class="text-right">Action</th>
            </tr>
          @if(!empty($supplier))
            <tr>
              <td><a href="javascript:void(0)">{{$supplier->id}}</a></td>
              <td>{{$supplier->name}}</td>
              <td>{{$supplier->manaingDirectorDetails}}</td>
              <td>{{$supplier->corporateOfficeDetails}}</td>
              <td class="text-right">
                <a href="{{route('dcpsteponedit',$supplier->id)}}"><span class="btn label-warning">Edit</span></a>
                <form  action="{{route('dcpdestroy',$supplier->id)}}" method="post" style="display:inline-block" id="form2">
                  {{csrf_field()}}
                  <input type="hidden" name="_method" value="DELETE" id="form1">
                  <input class="btn label-danger" type="submit" value="Delete">
                </form>

              </td>
                    </tr>

             @endif
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
@endsection

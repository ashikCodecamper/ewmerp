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

            </tr>
          @if(!empty($suppliers))
              @foreach($suppliers as $key=>$supplier)
                <tr>
                  <td><a href="{{route("supplierShow",['id'=>$supplier->id])}}">{{$key+1}}</a></td>
                  <td><a href="{{route("supplierShow",['id'=>$supplier->id])}}">{{$supplier->name}}</a></td>
                  <td>{{$supplier->manaingDirectorDetails}}</td>
                  <td>{{$supplier->corporateOfficeDetails}}</td>
                  <td class="text-right">
                    <form id="form234" action="{{route('supplierDestroy',$supplier->id)}}" method="post" style="display:inline-block">
                      {{csrf_field()}}
                      <input type="hidden" name="_method" value="DELETE">
                      <input class="btn label-danger" type="submit" value="Delete">
                    </form>

                  </td>
                </tr>
              @endforeach
             @endif
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
@endsection

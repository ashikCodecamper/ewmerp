@extends('layouts.apps')
@section('module-name','Product-Type settings')
@section('content')
<div class="row">
        <div class="col-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Update Product-Type</h3>

              <div class="box-tools" style="float:right;">
                  <a href="{{route('productstype.index')}}"><button type="buton" class="btn bg-purple btn-lg" ><strong>Product-Type List<strong></button></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                    <form class="" action="{{route('productstype.update',$type->id)}}" method="post" data-parsley-validate>
                      {{csrf_field()}}
                      <input type="hidden" name="_method" value="PUT">
                      <div class="form-group">
                        <label for="">Product Type</label>
                        <input type="text" name="type_name" value="{{$type->type}}" class="form-control" required="" data-parsley-error-message="Enter Product Type.">
                      </div>
                      <button type="submit" class="btn btn-large bg-green">Save</button>
                    </form>
                  </div>
                  <div class="col-md-2"></div>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
@endsection

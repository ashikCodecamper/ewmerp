@extends('layouts.apps')
@section('module-name','Supplier settings')
@section('content')
<div class="row">
        <div class="col-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Create Supplier</h3>

              <div class="box-tools" style="float:right;">
                  <a href="{{route('supplier.index')}}"><button type="buton" class="btn bg-purple btn-lg" ><strong>Supplier List<strong></button></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                    <form class="" action="{{route('supplier.store')}}" method="post" data-parsley-validate>
                      {{csrf_field()}}
                      <div class="form-group {{$errors->has('sup_name') ? 'has-error' : ''}}">
                        <label for="">Supplier Name</label>
                        <input type="text" name="sup_name" value="{{old('sup_name')}}" class="form-control" required="" data-parsley-error-message="Enter a Supplier">
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

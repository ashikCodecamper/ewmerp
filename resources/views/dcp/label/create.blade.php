@extends('layouts.apps')
@section('module-name','Label settings')
@section('content')
<div class="row">
        <div class="col-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Create Label</h3>

              <div class="box-tools" style="float:right;">
                  <a href="{{route('label.index')}}"><button type="buton" class="btn bg-purple btn-lg" ><strong>Label List<strong></button></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                    <form class="" action="{{route('label.store')}}" method="post" data-parsley-validate>
                      {{csrf_field()}}
                      <div class="form-group">
                        <select class="form-control" name="brand" required="" data-parsley-error-message="Select Brand">
                          <option value="">-Select Brand-</option>
                          @foreach($brand as $b)
                          <option value="{{$b->id}}">{{$b->brand_name}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="">Label Name</label>
                        <input type="text" name="lab_name" value="{{old('lab_name')}}" class="form-control" required="" data-parsley-error-message="Enter a Label">
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

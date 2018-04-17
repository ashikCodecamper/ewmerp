@extends('layouts.apps')
@section('module-name','Category settings')
@section('content')
<div class="row">
        <div class="col-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Update Category</h3>

              <div class="box-tools" style="float:right;">
                  <a href="{{route('productcategory.index')}}"><button type="buton" class="btn bg-purple btn-lg" ><strong>Category List<strong></button></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                  <form class="" action="{{route('productcategory.update',$dcpcat->id)}}" method="post">
                      {{csrf_field()}}
                      <input type="hidden" name="_method" value="PUT">
                       <div class="form-group">
                        <label for="">Product Type</label>
                        <select class="form-control" name="product_type">
                          <option value="">-Select Type-</option>
                          @foreach($dcptype as $p)
  <option value="{{$p->id}}" {{$dcpcat->dcproductype_id==$p->id ? 'selected' :''}}>{{$p->type}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="">Category Name</label>
                        <input type="text" name="cat_name" value="{{$dcpcat->name}}" class="form-control">
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

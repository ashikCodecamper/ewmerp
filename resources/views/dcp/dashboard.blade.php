@extends('layouts.apps')
@section('module-name','Development Critical Path')
@section('content')
    <div class="row">
      <div class="col-sm-6">
          <h4>Dcp Section</h4>
          <ul>
              <li><a href="{{route('dcpsteponeindex')}}">Proto Information Entry</a></li>
              <li><a href="{{route('dcpsteptwolist')}}">Price Matrix</a></li>
              <li><a href="{{route('approvedlist')}}">Price Matrix Approved List</a></li>
              <li><a href="{{route('orderprocess.index')}}">Order Receive Process</a></li>
          </ul>
      </div>
        <div class="col-sm-6">
            <h4>DCP Settings</h4>
            <ul>
                <li><a href="{{route('season.index')}}">Season</a></li>
                <li><a href="{{route('supplier.index')}}">Supplier</a></li>
                <li><a href="{{route('brand.index')}}">Brand</a></li>
                <li><a href="{{route('productstype.index')}}">Product Type</a></li>
                <li><a href="{{route('productcategory.index')}}">Product Categories</a></li>
                <li><a href="{{route('label.index')}}">Label</a></li>
                <li><a href="{{route('courier.index')}}">Courier</a></li>
            </ul>
        </div>
    </div>
@endsection

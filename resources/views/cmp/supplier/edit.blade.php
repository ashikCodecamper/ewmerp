@extends('layouts.apps')
@section('module-name','Compliance')
@section('stylesheet')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">

                <div class="box-header">
                    <h3 class="box-title">Supplier</h3>

                    <div class="box-tools" style="float:right;">
                        <a href="{{route('cmpHome')}}"><button type="buton" class="btn bg-purple btn-lg" ><strong>compliance list</strong></button></a>
                    </div>
                    <hr>
                </div>

                <form class="" method="post" action="{{route('supplierEdits', ['id'=>$supplier->id])}}" enctype="multipart/form-data" data-parsley-validate>
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-3">

                            <div class="form-group">
                                <label>Supplier Name</label>
                                <input type="text" value="{{$supplier->name}}" required name="supplier_name" class="form-control" value="">
                            </div>

                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-2">
                            <div class="form-group">
                                <label>supplier corporate</label>
                                <input type="text" value="{{$supplier->corporateOfficeDetails}}" required name="supplier_corporate" class="form-control" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="comment">Supplier corporate</label>
                            <textarea  type="text" rows="5"  required id="co" name="supplier_corporate" class="form-control">
                               {{nl2br($supplier->corporateOfficeDetails)}}
                            </textarea>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label>supplier site office</label>
                                <input type="text" value="{{$supplier->siteOfficeDetails}}"required name="supplier_site" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-2">
                        <div class="form-group">
                            <label for="so">Supplier site office</label>
                            <textarea  type="text" rows="5"  required id="so" name="supplier_site" class="form-control">
                               {{nl2br($supplier->corporateOfficeDetails)}}
                            </textarea>
                        </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label>supplier Managing Director</label>
                                <input type="text" value="{{$supplier->manaingDirectorDetails}}" required name="supplier_managing" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>supplier for</label>
                                <input type="text" value="{{$supplier->supplierFor}}" required name="supplier_for" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>supplier No</label>
                                <input type="text" value="{{$supplier->supplierNo}}" required name="supplier_no" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Bank Name</label>
                                <input type="text" value="{{$supplier->bankName}}" required name="supplier_bank" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Bank Branch</label>
                                <input type="text" value="{{$supplier->bankBranch}}" required name="supplier_bbranch" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Bank Address</label>
                                <input type="text" value="{{$supplier->bankAddress}}" required name="supplier_baddress" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Bank Account</label>
                                <input type="text" value="{{$supplier->bankAccountNo}}" required data-parsley-type="integer" name="supplier_baccount" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Bank Swift</label>
                                <input type="text" value="{{$supplier->bankSwift}}" required data-parsley-type="integer" name="supplier_bswift" class="form-control" value="">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-check">
                                <input type="checkbox" value="{{$supplier->bankIssue}}" class="form-check-input" id="exampleCheck2" name="supplier_bankissue">
                                <label class="form-check-label" for="exampleCheck2">is there any bank issue last 5 years</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-check">
                                <input type="checkbox" value="{{$supplier->workIssue}}" class="form-check-input" id="exampleCheck1" name="supplier_workissue">
                                <label class="form-check-label" for="exampleCheck1">is there any work issue last 5 years</label>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Out source process</label>
                                <input type="text" value="{{$supplier->outSourceProcess}}" required name="supplier_outsource" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Total workforce</label>
                                <input type="text" value="{{$supplier->totalWorkForce}}" data-parsley-type="integer" required name="supplier_totalworkforce" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Production Area</label>
                                <input type="text" value="{{$supplier->productionArea}}" required data-parsley-type="integer" name="supplier_productionarea" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Current Customer</label>
                                <input type="text" value="{{$supplier->currentCustomer}}" required name="supplier_currentcustomer" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-2">
                        <div class="form-group">
                            <label for="comment">Current Customer</label>
                            <textarea  type="text" rows="5"  required id="comment" name="supplier_currentcustomer" class="form-control">
                               {{nl2br($supplier->currentCustomer)}}
                            </textarea>
                        </div>
                        </div>
                    </div>
                    <div class="row"><div class="col-md-4"><input type="submit" name="" class="btn btn-success" value="Save"></div></div>


                </form>
            </div>
        </div>
    </div>


@endsection

@section('javascript')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <script type="text/javascript">

        $(document).ready(function() {
            $('#date-picker').daterangepicker({locale: {
                    format: 'YYYY-MM-DD',
                    startView: "years",
                }, singleDatePicker: true, "showDropdowns": true, }, function(start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
        });

    </script>
@endsection

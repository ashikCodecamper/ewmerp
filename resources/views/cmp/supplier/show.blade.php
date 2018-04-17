@extends('layouts.apps')
@section('module-name','Compliance')
@section('content')
    <div class="row">
        <div class="col-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Supplier basic information</h3>

                    <div class="box-tools" style="float:right;">
                        <a href="{{route('cmpHome')}}"><button type="buton" class="btn bg-purple btn-lg" ><strong>Back to All Compliance</strong></button></a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Supplier Name</th>
                                <th>Managing Director</th>
                                <th>Supplier Corporate Office</th>
                                <th>Supplier site Office</th>
                                <th>Supplier for</th>
                                <th>Supplier No</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if(!empty($supplier))
                                    <tr>
                                        <td>{{$supplier->name}}</td>
                                        <td>{{$supplier->manaingDirectorDetails}}</td>
                                        <td>{{$supplier->siteOfficeDetails}}</td>
                                        <td>{{$supplier->corporateOfficeDetails}}</td>
                                        <td>{{$supplier->supplierFor}}</td>
                                        <td>{{$supplier->supplierNo}}</td>
                                    </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>


            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Supplier Bank Details</h3>
                    <div class="box-tools" style="float:right;">
                        <a href="{{route('supplierEdit',['id'=>$supplier->id])}}">
                            <button  class="btn bg-purple btn-lg" >Edit Supplier information</button>
                        </a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table">
                        <tr>
                            <th>Bank Name</th>
                            <th>Bank Branch</th>
                            <th>Bank Address</th>
                            <th>Bank Account No</th>
                            <th>Bank Swift</th>
                            <th>Is there any Bank Issue</th>
                            <th>Is there any Work Issu</th>
                        </tr>

                        @if(!empty($supplier))
                            <tr>
                                <td>{{$supplier->bankName}}</td>
                                <td>{{$supplier->bankBranch}}</td>
                                <td>{{$supplier->bankAddress}}</td>
                                <td>{{$supplier->bankAccountNo}}</td>
                                <td>{{$supplier->bankSwift}}</td>
                                @if($supplier->bankIssue)
                                    <td>yes</td>
                                @else
                                    <td>no</td>
                                @endif
                                @if($supplier->workIssue)
                                    <td>yes</td>
                                @else
                                    <td>no</td>
                                @endif


                            </tr>
                        @endif
                    </table>
                </div>
                <!-- /.box-body -->
            </div>


            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Process Details</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table">
                        <tr>
                            <th>Out Source process</th>
                            <th>Total Workforce</th>
                            <th>Total Production Area</th>
                            <th>current Customers</th>

                        </tr>

                        @if(!empty($supplier))
                            <tr>
                                <td>{{$supplier->outSourceProcess}}</td>
                                <td>{{$supplier->totalWorkForce}}</td>
                                <td>{{$supplier->productionArea	}}</td>
                                <td>{{$supplier->currentCustomer}}</td>
                            </tr>
                        @endif
                    </table>
                </div>
                <!-- /.box-body -->
            </div>


            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Smeta Details</h3>
                    <div class="box-tools" style="float:right;">
                        <a href="{{route('smetaEdit',['id'=>$supplier->id])}}"><button type="buton" class="btn bg-purple btn-lg" ><strong>Edit Smeta Registration</strong></button></a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table">
                        <tr>
                            <th>ZC Number</th>
                            <th>ZS Number</th>
                            <th>Date Of Expiry</th>
                        </tr>

                        @if(!empty($supplier->smeta))
                            <tr>
                                <td>{{$supplier->smeta->smetaZcNumber}}</td>
                                <td>{{$supplier->smeta->smetaZsNumber}}</td>
                                <td>{{$supplier->smeta->smetaExpiryDate}}</td>
                            </tr>
                            @else
                            <td><button class="btn-blue"><a href="{{route('smetaCreate', ['id' => $supplier->id])}}">create smeta registration</a></button></td>
                        @endif
                    </table>
                </div>
                <!-- /.box-body -->
            </div>



            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Smeta Audit Details</h3>
                    <div class="box-tools" style="float:right;">
                        <a href="{{route('auditEdit',['id'=>$supplier->id])}}">
                            <button type="buton" class="btn bg-purple btn-lg" ><strong>Edit Smeta Audit details</strong></button>
                        </a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table">
                        <tr>
                            <th>Audit Date</th>
                            <th>Next Audit Date</th>
                            <th>Number Of Caps</th>
                            <th>CLosing Date</th>
                        </tr>

                        @if(!empty($supplier->smeta->audit))
                            <tr>
                                <td>{{$supplier->smeta->audit->smetaAuditDate}}</td>
                                <td>{{$supplier->smeta->audit->smetaNextAuditDate}}</td>
                                <td>{{$supplier->smeta->audit->semtaNumberOfCap}}</td>
                                <td>{{$supplier->smeta->audit->smetaClosingDate}}</td>
                            </tr>
                        @else
                            <td><button class="btn-blue"><a href="{{route('auditCreate', ['id' => $supplier->id])}}">create smeta audit</a></button></td>
                        @endif
                    </table>
                </div>
                <!-- /.box-body -->
            </div>

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Smeta Audit Caps</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table">
                        <tr>
                            <th>No</th>
                            <th>Description</th>
                            <th>TimeLine</th>
                            <th>Verification By Third Party</th>
                            <th>Comments</th>
                        </tr>

                        @if(!empty($supplier->smeta->audit->caps))

                            @foreach($supplier->smeta->audit->caps as $key => $cap)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$cap->description}}</td>
                                    <td>{{$cap->timeline}}</td>
                                    @if($cap->validationByThirdParty)
                                        <td>Yes</td>
                                    @else
                                        <td>No</td>
                                    @endif
                                    <td>{{$cap->comments}}</td>
                                </tr>

                            @endforeach
                                <td>
                                <a href="{{route('auditcapCreate', ['id' => $supplier->id])}}">
                                     <button class="btn  btn-lg btn-success">create audit caps</button>
                                </a>
                                </td>
                        @else
                            <td><button class="btn-blue"><a href="{{route('auditcapCreate', ['id' => $supplier->id])}}">create audit caps</a></button></td>
                        @endif
                    </table>
                </div>
                <!-- /.box-body -->
            </div>


            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Accord Aliance Details</h3>
                    <div class="box-tools" style="float:right;">
                        <a href="{{route('alliance.edit',['id'=>$supplier->id])}}">
                            <button type="buton" class="btn bg-purple btn-lg" ><strong>Edit Alliance details</strong></button>
                        </a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table">
                        <tr>
                            <th>Building Safety Current Percentage</th>
                            <th>Building Safety Expected Percentage</th>

                            <th>Fire Safety Current Percentage</th>
                            <th>Fire Safety Expected Percentage</th>

                            <th>Electrical Safety Current Percentage</th>
                            <th>Electrical Safety Expected Percentage</th>
                        </tr>

                        @if(!empty($supplier->alliance))
                                <tr>

                                    <td>{{$supplier->alliance->bsPercentage}}%</td>
                                    <td>{{$supplier->alliance->bsPercentageE}}%</td>

                                    <td>{{$supplier->alliance->fsPercentage}}%</td>
                                    <td>{{$supplier->alliance->fsPercentageE}}%</td>

                                    <td>{{$supplier->alliance->esPercentage}}%</td>
                                    <td>{{$supplier->alliance->esPercentageE}}%</td>

                                </tr>
                        @else
                            <td><button class="btn-blue"><a href="{{route('alliance.create', ['id' => $supplier->id])}}">create alliance </a></button></td>
                        @endif
                    </table>
                </div>
                <!-- /.box-body -->
            </div>



            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Current Compliance Approval</h3>
                    @if(!empty($supplier->alliance))
                        <div class="box-tools" style="float:right;">
                            <a href="{{route('approval.edit',['id'=>$supplier->id])}}">
                                <button type="buton" class="btn bg-purple btn-lg" ><strong>Edit current Compliance Approval</strong></button>
                            </a>
                        </div>
                    @endif
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>sedex audit</th>
                            <th>sedex expiry</th>

                            <th>bsci audit</th>
                            <th>bsci expiry date</th>

                            <th>wrap audit</th>
                            <th>wrap expiry</th>

                            <th>ics/wca audit</th>
                            <th>ics/wca expiry</th>
                        </tr>
                        </thead>

                        <tbody>

                        @if(!empty($supplier->approval))
                            <tr>
                                <td>{{$supplier->approval->sedex_auditdate}}</td>
                                <td>{{$supplier->approval->sedex_expirydate}}</td>

                                <td>{{$supplier->approval->bsci_auditdate}}</td>
                                <td>{{$supplier->approval->bsci_expirydate}}</td>

                                <td>{{$supplier->approval->wrap_auditdate}}</td>
                                <td>{{$supplier->approval->wrap_expirydate}}</td>

                                <td>{{$supplier->approval->ics_auditdate}}</td>
                                <td>{{$supplier->approval->ics_expirydate}}</td>
                            </tr>

                        @else
                            <td><button class="btn-blue"><a href="{{route('approval.create', ['id' => $supplier->id])}}">create current compliance</a></button></td>

                        @endif

                        </tbody>

                    </table>
                </div>
                <!-- /.box-body -->
            </div>


            <!-- /.box -->
        </div>
    </div>
@endsection

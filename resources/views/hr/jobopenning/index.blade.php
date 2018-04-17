<!-- @extends('layouts.apps') -->
@section('module-name','Employment')
@section('content')
<div class="row">
        <div class="col-10">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Job Openning</h3>

              <div class="box-tools" style="float:right;">
                  <a href="{{route('jobopenning.create')}}"><button type="buton" class="btn bg-purple btn-lg" ><strong>Add New Job<strong></button></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-responsive">
                <tr>
                  <th>Title</th>
                  <th>No of Vacancy</th>
                  <th>Deadline</th>
                  <th class="text-right">Action</th>
                </tr>
                @if(!empty($jobopennings))
                @foreach($jobopennings as $jobopenning)
                <tr>
                  <td>{{$jobopenning->job_title}}</td>
                  <td class="text-center">{{$jobopenning->job_vacancy}}</td>
                  <td class="text-center">{{date('d-m-Y', strtotime($jobopenning->job_deadline))}}</td>
                  <td class="text-right">
                    <a href="{{route('jobopenning.edit',$jobopenning->id)}}"><span class="btn label-warning">Edit</span></a>
                    <form  action="{{route('jobopenning.destroy',$jobopenning->id)}}" method="post" style="display:inline-block" id="form1">
                      {{csrf_field()}}
                      <input type="hidden" name="_method" value="DELETE">
                      <input class="btn label-danger" type="submit" value="Delete" >
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
@section('javascript')
  

@endsection

@extends('layouts.apps')
@section('module-name','Production Critical Path')
@section('stylesheet')
 <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style type="text/css">
      .row{
        padding: 15px;
      }
      .green {
        background-color: #00e676 ;
      }
      .red {
        background-color: #e57373;
      }
      .yellow {
        background-color: yellow;
      }
    </style>
@endsection
@section('content')
    <div id="main_div" class="row">
     <div class="col-12">
       <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lab-Dip</h3>

              <div class="box-tools" style="float:right;">
                  <a href="{{route('labdip.index')}}"><button type="buton" class="btn bg-purple btn-lg" ><strong>List<strong></button></a>
              </div>
              <hr>
            </div>

        <form method="post" action="{{route('labdip.store')}}" data-parsley-validate>
          {{csrf_field()}}

          <div class="row">
            <div class="col-md-2">
              <div class="form-group">
                <label>Proto no.</label>
                <!---->
                <!-- <input type="text" name="proto" class="form-control" readonly=""> -->
                <select v-model="proto" id="protoid" name="proto" class="form-control" required="" data-parsley-error-message="Select Proto">
                  <option value="">-Select Proto-</option>
                  @foreach($data as $d)
                    <option value="{{$d->source_id}}">{{$d->proto}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          @verbatim
          <div class="row" v-for="(color, index) in main_colors">
            <div class="col-md-2">
              <div class="form-group">
                  <label class="scolor">Main Color.{{index + 1}}</label>
                 <input :value="color.color" type="text" class="form-control" name="main_color[]"  required="" data-parsley-error-message="Enter Color Code/Name" placeholder="Color Code or Name">
                 <span class="text-danger"></span>
              </div>
            </div>

            <div class="col-md-0">
              <div class="form-group">
                 <input hidden :value="color.id" type="text" class="form-control" name="main_color_id[]" required="" data-parsley-error-message="Enter Color Code/Name" placeholder="Color Code or Name">
                 <span class="text-danger"></span>
              </div>
            </div>

          <div class="col-md-2">
            <div class="form-group">
                <label>Sub-Color.</label>
                <input type="text" class="form-control" name="sub_color[]"  required="" data-parsley-error-message="Enter Color Code/Name" placeholder="Color Code or Name">
                <span class="text-danger"></span>
            </div>
          </div>

          <div class="col-md-2">
            <div class="form-group">
                <label>Target Date.</label>

                <input v-if="num_delay[index]"  :value="moment(color.ex_factory_date).subtract(80, 'day').format('YYYY-MM-DD')"
                v-bind:class="{ 'green': num_delay[index].green, 'yellow': num_delay[index].yellow, 'red': num_delay[index].red }" type="text" class="form-control" name="target[]">

                <input v-else  readonly :value="moment(color.ex_factory_date).subtract(80, 'day').format('YYYY-MM-DD')" type="text" class="form-control" name="target[]" >
                <span class="text-danger"></span>
            </div>
          </div>

          <div class="col-md-2">
            <div class="form-group">
              <label>Submission Date</label>
              <input type="text" name="submissiondate[]" class="form-control subdate date-picker" required="" data-parsley-error-message="Enter Date" placeholder="YYYY-MM-DD" :id="index">
            </div>
          </div>


          <div class="col-md-2">
            <div class="form-group">
              <label>Parcel Tracking Number</label>
              <input type="text" name="trackno[]" class="form-control" required="" data-parsley-error-message="Enter Parcel Tracking no." placeholder="Parcel Tracking No.">
            </div>
          </div>


          <div class="col-md-2" id="uardate">
            <div class="form-group">
                <label>UK Arrival Date</label>
                <input type="text" name="arrivedate[]" id="ukardate" class="form-control ukardate date-picker" placeholder="YYYY-MM-DD">
            </div>
          </div>

          <div class="col-md-2">
            <div class="form-group">
                <label>Recieve Date</label>
                <input type="text" name="rcvdate[]" id="rcvdate" class="form-control rcvdate date-picker" placeholder="YYYY-MM-DD">
            </div>
          </div>

          <div class="col-md-2" id="delays">
            <div class="form-group">
                <label>No. of Delays</label>
                <input v-if="num_delay[index]" :value="num_delay[index].delay" v-bind:class="{ 'green': num_delay[index].green, 'yellow': num_delay[index].yellow, 'red': num_delay[index].red }" id="delaysdate" type="text" class="form-control" name="delaysno[]" required="" data-parsley-error-message="Enter Delays Date" placeholder="Delay Days">
                <input v-else="num_delay[index]" id="delaysdate" type="text" class="form-control" name="delaysno[]" required="" data-parsley-error-message="Enter Delays Date" placeholder="Delay Days">
            </div>
          </div>

          <div class="col-md-2">
            <div class="form-group">
                <label>Comment</label>
                <select required name="firstsubmissioncmnt[]" class="form-control">
                  <option value="Approved">Approved</option>
                  <option value="Rejected">Rejected</option>
                </select>
            </div>
          </div>

          <div class="col-md-2">
            <div class="form-group">
                <label>Comment Date</label>
                <input type="text" name="comment_date[]" id="rcvdate" class="form-control rcvdate date-picker" placeholder="YYYY-MM-DD">
            </div>
          </div>

          <div class="col-md-2">
              <div class="form-group">
                <label>Remarks</label>
                <textarea rows="1" cols="25" name="rev_comment[]" placeholder="Revised Comment"></textarea>
              </div>
          </div>

          <div class="col-md-2">
              <div class="form-group">
                <label>POMS Ship Date</label>
                <input type="text" name="pomsdate[]" id="pomsdate" class="form-control pomsdate date-picker" placeholder="YYYY-MM-DD">
              </div>
          </div>
        </div>
        <hr>

       <div class="row">
          <div class="col-md-4"></div>
            <div class="col-md-4">
              <input type="submit" name="submit" class="btn btn-info btn-block" value="SAVE">

            </div>
       </div>

       </form>
     </div>
    </div>
  </div>
    @endverbatim
@endsection
@section('javascript')
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>


<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>


<script>

  var vm = new Vue({
    el: "#main_div",
    data: {
      proto: null,
      main_colors: [],
      sb_dates: [],
      num_delay: []
    },
    methods: {
      fetch_colors (proto_id) {
        var self = this
        axios.get('{{route("labdip.colors")}}',{
            params: {
              id: this.proto
            }
          })
          .then(function (response) {
              response.data.forEach(function(el) {
                self.main_colors.push(el)
              })
              $('document').ready(function(){
                   $('.date-picker').daterangepicker(
                    {locale: {
                      format: 'YYYY-MM-DD',
                    },
                    //autoUpdateInput: false,
                    autoApply: true,
                    singleDatePicker: true, "showDropdowns": true, },
                    function(start, end, label) {
                      var d = moment(end.toISOString())
                      //console.log(d.format('YYYY-MM-DD'))
                      //console.log(this.element[0].id)
                      var id = this.element[0].id
                      Vue.set(self.sb_dates, id, d.format('YYYY-MM-DD'))

                  });
                });

          })
      },
      moment (a) {
          return moment(a);
      }
    },
    watch: {
      proto: function (oldValue, newValue) {
        console.log(this.proto)
        this.main_colors = []
        this.fetch_colors(this.proto)
      },
      sb_dates: {
      handler: function (val, oldVal) {
        var l = this.sb_dates.length;
        for (var i = 0; i < l; i++) {
          var ex = moment(this.main_colors[i].ex_factory_date).subtract(80, 'days')
          //console.log('target => ', ex.format('YYYY-MM-DD'))
          var sub = moment(this.sb_dates[i])
          var dif = ex.diff(sub, 'day')
          //console.log(typeof dif)
          var red = false, green = false, yellow = false

          if (dif > 0) {
            green = true
            dif = 0
          } else if (dif < 7 && dif >= -5) {
            yellow = true
          } else {
            red = true
          }

          Vue.set(this.num_delay, i, {delay: dif, red: red, yellow: yellow, green: green})

        }
      },
      deep: true
    },
    },


  })

</script>


@endsection

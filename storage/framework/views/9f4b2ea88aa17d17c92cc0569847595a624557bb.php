<?php $__env->startSection('module-name','Production Critical Path'); ?>
<?php $__env->startSection('stylesheet'); ?>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div id="main_div" class="row">
     <div class="col-12">
       <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lab-Dip</h3>

              <div class="box-tools" style="float:right;">
                  <a href="<?php echo e(route('labdip.index')); ?>"><button type="buton" class="btn bg-purple btn-lg" ><strong>List<strong></button></a>
              </div>
              <hr>
            </div>

        <form method="post" action="<?php echo e(route('labdip.editsave', ['id'=> $id])); ?>" data-parsley-validate>
          <?php echo e(csrf_field()); ?>

          
          <div class="row">
            <div class="col-md-2">
              <div class="form-group">
                  <label class="scolor">Main Color</label>
                 <input disabled :value="main_color.main_color" type="text" class="form-control" name="main_color"  required="" data-parsley-error-message="Enter Color Code/Name" placeholder="Color Code or Name">
                 <span class="text-danger"></span>
              </div>
            </div>

            <div class="col-md-0">
              <div class="form-group">
                 <input hidden :value="main_color.id" type="text" class="form-control" name="main_color_id" required="" data-parsley-error-message="Enter Color Code/Name" placeholder="Color Code or Name">
                 <span class="text-danger"></span>
              </div>
            </div>

          <div class="col-md-2">
            <div class="form-group">
                <label>Sub-Color.</label>
                <input v-model="main_color.sub_colors" type="text" class="form-control" name="sub_color"  required="" data-parsley-error-message="Enter Color Code/Name" placeholder="Color Code or Name">
                <span class="text-danger"></span>
            </div>
          </div>

          <div class="col-md-2">
            <div class="form-group">
                <label>Target Date.</label>

                <input  :value="moment(exf).subtract(80, 'day').format('YYYY-MM-DD')"
                :class="{ 'green': num_delay.green, 'yellow': num_delay.yellow, 'red': num_delay.red }" type="text" class="form-control" name="target">
                <span class="text-danger"></span>
            </div>
          </div>

          <div class="col-md-2">
            <div class="form-group">
              <label>Submission Date</label>
              <input :value="sb_date" type="text" name="submissiondate" class="form-control subdate date-picker1" required="" data-parsley-error-message="Enter Date" placeholder="YYYY-MM-DD">
            </div>
          </div>


          <div class="col-md-2">
            <div class="form-group">
              <label>Parcel Tracking Number</label>
              <input :value="main_color.parcel_no" type="text" name="trackno" class="form-control" required="" data-parsley-error-message="Enter Parcel Tracking no." placeholder="Parcel Tracking No.">
            </div>
          </div>


          <div class="col-md-2" id="uardate">
            <div class="form-group">
                <label>UK Arrival Date</label>
                <input :value="main_color.uk_arrive_date"type="text" name="arrivedate" id="ukardate" class="form-control ukardate date-picker" placeholder="YYYY-MM-DD">
            </div>
          </div>

          <div class="col-md-2">
            <div class="form-group">
                <label>Recieve Date</label>
                <input :value="main_color.uk_recieve_date" type="text" name="rcvdate" id="rcvdate" class="form-control rcvdate date-picker" placeholder="YYYY-MM-DD">
            </div>
          </div>

          <div class="col-md-2" id="delays">
            <div class="form-group">
                <label>No. of Delays</label>
                <input :value="num_delay.delay" v-bind:class="{ 'green': num_delay.green, 'yellow': num_delay.yellow, 'red': num_delay.red }" id="delaysdate" type="text" class="form-control" name="delaysno" required="" data-parsley-error-message="Enter Delays Date" placeholder="Delay Days">
            </div>
          </div>

          <div class="col-md-2">
            <div class="form-group">
                <label>Comment</label>
                <select required name="firstsubmissioncmnt" class="form-control">
                  <option value="Approved">Approved</option>
                  <option value="Rejected">Rejected</option>
                </select>
            </div>
          </div>

          <div class="col-md-2">
            <div class="form-group">
                <label>Comment Date</label>
                <input :value="main_color.comment_date"type="text" name="comment_date" id="rcvdate" class="form-control rcvdate date-picker" placeholder="YYYY-MM-DD">
            </div>
          </div>

          <div class="col-md-2">
              <div class="form-group">
                <label>Remarks</label>
                <textarea v-model="main_color.revised_comment"rows="1" cols="25" name="rev_comment" placeholder="Revised Comment"></textarea>
              </div>
          </div>

          <div class="col-md-2">
              <div class="form-group">
                <label>POMS Ship Date</label>
                <input type="text" :value="main_color.poms_date" name="pomsdates" id="pomsdate" class="form-control pomsdate date-picker" placeholder="YYYY-MM-DD">
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
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>


<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>


<script>

  var vm = new Vue({
    el: "#main_div",
    data: {
      main_color: {},
      sb_date: '',
      num_delay: {},
      exf: null
    },
    methods: {
      fetch_color () {
        var self = this
        axios.get('<?php echo e(route("labdip.color")); ?>',{
            params: {
              id: <?php echo e($id); ?>

            }
          })
          .then(function (response) {
                self.main_color = response.data

                self.sb_date = response.data.submission_date

                var red = false, green = false, yellow = false
                var ex = moment(self.exf).subtract(80, 'days')
                //console.log('target => ', ex.format('YYYY-MM-DD'))
                var sub = moment(self.main_color.submission_date)
                var dif = ex.diff(sub, 'day')

                if (dif > 0) {    // so far i have coded well na?
                  green = true
                  dif = 0
                } else if (dif < 7 && dif >= -5) {
                  yellow = true
                } else {
                  red = true
                }

                self.num_delay = {'delay': dif, 'red': red, 'yellow': yellow, 'green': green}
                $('document').ready(function(){
                   $('.date-picker1').daterangepicker(
                    {locale: {
                      format: 'YYYY-MM-DD',
                    },
                    //autoUpdateInput: false,
                    autoApply: true,
                    singleDatePicker: true, "showDropdowns": true, },
                    function(start, end, label) {
                      var d = moment(end.toISOString())
                      console.log(d.format('YYYY-MM-DD'))
                      console.log(self.sb_date)

                      self.sb_date = d.format('YYYY-MM-DD')

                  });
                  $('.date-picker').daterangepicker(
                   {locale: {
                     format: 'YYYY-MM-DD',
                   },
                   //autoUpdateInput: false,
                   autoApply: true,
                   singleDatePicker: true, "showDropdowns": true, },
                   function(start, end, label) {
                     var d = moment(end.toISOString())
                     console.log(d.format('YYYY-MM-DD'))
                     console.log(self.sb_date)

                 });
                });

          })
      },
      fetch_exf() {
        var self = this
         axios.get('<?php echo e(route("labdip.exf")); ?>',{
            params: {
              id: <?php echo e($id); ?>

            }
          })
          .then(function (response) {
                self.exf = response.data
                console.log(response.data)
          })
      },
      moment (a) {
          return moment(a);
      }
    },
    watch: {
      sb_date: {
        handler: function (val, oldVal) {
            this.main_color.submission_date = val;
            var ex = moment(this.exf).subtract(80, 'days')
            //console.log('target => ', ex.format('YYYY-MM-DD'))
            var sub = moment(this.sb_date)
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

            this.num_delay = {delay: dif, red: red, yellow: yellow, green: green}
        },
      },
    },

    created () {
      this.fetch_exf()
      this.fetch_color()
    }
  })

</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.apps', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
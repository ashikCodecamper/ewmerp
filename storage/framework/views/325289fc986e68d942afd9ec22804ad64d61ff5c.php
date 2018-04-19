<?php $__env->startSection('stylesheet'); ?>
    <link rel="stylesheet" href="<?php echo e(asset("assets/fullcalendar/fullcalendar.css")); ?>"/>
    <link rel="stylesheet"
          href="<?php echo e(asset("assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css")); ?>"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('module-name','Holiday Calender'); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">

        <!-- /.col -->
        <div class="col-lg-10 col-md-12">
            <div class="box box-primary">
                <div class="box-body no-padding">
                    <!-- THE CALENDAR -->
                    <div id="calendar"></div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /. box -->
        </div>
        <!-- /.col -->
    </div>


    <!-- BEGIN MODAL -->
    <div class="modal none-border" id="my-event">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><strong>Add Event</strong></h4>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white waves-effect" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success save-event waves-effect waves-light">Create
                        event
                    </button>
                    <button type="button" class="btn btn-danger delete-event waves-effect waves-light"
                            data-dismiss="modal">Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Add Category -->
    <div class="modal fade none-border" id="add-new-events">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><strong>Add</strong> a category</h4>
                </div>
                <div class="modal-body">
                    <form role="form">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="control-label">Category Name</label>
                                <input class="form-control form-white" placeholder="Enter name" type="text"
                                       name="category-name"/>
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">Choose Category Color</label>
                                <select class="form-control form-white" data-placeholder="Choose a color..."
                                        name="category-color">
                                    <option value="success">Success</option>
                                    <option value="danger">Danger</option>
                                    <option value="info">Info</option>
                                    <option value="primary">Primary</option>
                                    <option value="warning">Warning</option>
                                    <option value="inverse">Inverse</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect waves-light save-category"
                            data-dismiss="modal">Save
                    </button>
                    <button type="button" class="btn btn-white waves-effect" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>


    </div>

    <script src="<?php echo e(asset("assets/fullcalendar/lib/jquery.min.js")); ?>"></script>
    <script src="<?php echo e(asset("assets/fullcalendar/lib/moment.min.js")); ?>"></script>
    <script src="<?php echo e(asset("assets/fullcalendar/fullcalendar.js")); ?>"></script>
    <script src="<?php echo e(asset("assets/fullcalendar/gcal.js")); ?>"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {

            function save(d) {
                $.ajax({
                    url: "<?php echo e(route('holiday.add')); ?>",
                    dataType: 'json',
                    type: 'POST',
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        data: JSON.stringify(d),
                    },
                });
            }


            var d = new Date();
            var s = d.getFullYear() + "-" + d.getMonth() + 1 + "-" + d.getDay();

            $('#calendar').fullCalendar({

                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                defaultDate: Date.now(),
                navLinks: true, // can click day/week names to navigate views
                selectable: false,
                selectHelper: true,

                //when clicked on the calender new event get's added
                select: function (start, end) {

                    //showing the modal
                    $('#my-event').modal({
                        backdrop: 'static'
                    });

                    //rendering the form dynamically
                    var form = $("<form></form>");
                    form.append("<div class='row'></div>");
                    form.find(".row")
                        .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Event Name</label><input class='form-control' placeholder='Insert Event Name' type='text' name='title'/></div></div>")
                        .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Category</label><select class='form-control' name='category'></select></div></div>")
                        .find("select[name='category']")
                        .append("<option value='bg-danger'>Danger</option>")
                        .append("<option value='bg-success'>Success</option>")
                        .append("<option value='bg-purple'>Purple</option>")
                        .append("<option value='bg-primary'>Primary</option>")
                        .append("<option value='bg-pink'>Pink</option>")
                        .append("<option value='bg-info'>Info</option>")
                        .append("<option value='bg-warning'>Warning</option></div></div>");
                    $('#my-event').find('.delete-event').hide().end().find('.save-event').show().end().find('.modal-body').empty().prepend(form).end().find('.save-event').unbind('click').click(function () {
                        form.submit();
                    });

                    //when submitted the form
                    $('#my-event').find('form').on('submit', function () {
                        var title = form.find("input[name='title']").val();
                        var beginning = form.find("input[name='beginning']").val();
                        var ending = form.find("input[name='ending']").val();
                        var categoryClass = form.find("select[name='category'] option:checked").val();
                        if (title !== null && title.length != 0) {
                            var eventData = {
                                title: title,
                                start: start.format("YYYY-MM-DD[T]HH:MM:SS"),
                                end: end.format("YYYY-MM-DD[T]HH:MM:SS"),
                                allDay: false,
                                className: categoryClass
                            };
                            save(eventData);

                            $("#my-event").modal('hide');
                            $('#calendar').fullCalendar('renderEvent', eventData, true);
                        }
                        else {
                            alert('You have to give a title to your event');
                        }
                        return false;

                    });
                    $("#calendar").fullCalendar('unselect');

                },

                editable: false,

                eventSources: [
                    {
                        events: function (start, end, timezone, callback) {
                            $.ajax({
                                url: "<?php echo e(route('holiday.all')); ?>",
                                dataType: 'json',
                                data: {
                                    start: start.unix(),
                                    end: end.unix()
                                },
                                success: function (msg) {
                                    var events = msg.events;

                                    callback(events);


                                },

                            });
                        }
                    }
                ],

            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.apps', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
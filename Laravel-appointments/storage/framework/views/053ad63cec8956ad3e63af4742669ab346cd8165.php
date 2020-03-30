<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo e(trans('global.systemCalendar')); ?></h3>
    <div class="card">
        <div class="card-header">
            <?php echo e(trans('global.systemCalendar')); ?>

        </div>

        <div class="card-body">
            <link rel='stylesheet'
                  href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css'/>

            <div id='calendar'></div>


        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    ##parent-placeholder-16728d18790deb58b3b8c1df74f06e536b532695##
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
    <script>
      $(document).ready(function () {
        // page is now ready, initialize the calendar...
        events =<?php echo json_encode($events); ?>;
        $('#calendar').fullCalendar({
          // put your options and callbacks here
          events: events,
          defaultView: 'agendaWeek'
        })
      })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\john\Documents\Laravel-Appointments\resources\views/admin/calendar/calendar.blade.php ENDPATH**/ ?>
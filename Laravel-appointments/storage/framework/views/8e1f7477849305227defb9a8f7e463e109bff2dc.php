<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('global.show')); ?> <?php echo e(trans('cruds.appointment.title')); ?>

    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.appointment.fields.id')); ?>

                        </th>
                        <td>
                            <?php echo e($appointment->id); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.appointment.fields.client')); ?>

                        </th>
                        <td>
                            <?php echo e($appointment->client->name ?? ''); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.appointment.fields.employee')); ?>

                        </th>
                        <td>
                            <?php echo e($appointment->employee->name ?? ''); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.appointment.fields.start_time')); ?>

                        </th>
                        <td>
                            <?php echo e($appointment->start_time); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.appointment.fields.finish_time')); ?>

                        </th>
                        <td>
                            <?php echo e($appointment->finish_time); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.appointment.fields.price')); ?>

                        </th>
                        <td>
                            $<?php echo e($appointment->price); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.appointment.fields.comments')); ?>

                        </th>
                        <td>
                            <?php echo $appointment->comments; ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            Services
                        </th>
                        <td>
                            <?php $__currentLoopData = $appointment->services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $services): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="label label-info label-many"><?php echo e($services->name); ?></span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="<?php echo e(url()->previous()); ?>">
                <?php echo e(trans('global.back_to_list')); ?>

            </a>
        </div>


    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\john\Documents\Laravel-Appointments\resources\views/admin/appointments/show.blade.php ENDPATH**/ ?>
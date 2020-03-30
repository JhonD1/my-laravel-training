<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('global.show')); ?> <?php echo e(trans('cruds.employee.title')); ?>

    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.employee.fields.id')); ?>

                        </th>
                        <td>
                            <?php echo e($employee->id); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.employee.fields.name')); ?>

                        </th>
                        <td>
                            <?php echo e($employee->name); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.employee.fields.email')); ?>

                        </th>
                        <td>
                            <?php echo e($employee->email); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.employee.fields.phone')); ?>

                        </th>
                        <td>
                            <?php echo e($employee->phone); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.employee.fields.photo')); ?>

                        </th>
                        <td>
                            <?php if($employee->photo): ?>
                                <a href="<?php echo e($employee->photo->getUrl()); ?>" target="_blank">
                                    <img src="<?php echo e($employee->photo->getUrl('thumb')); ?>" width="50px" height="50px">
                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Services
                        </th>
                        <td>
                            <?php $__currentLoopData = $employee->services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $services): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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

        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
        <div class="tab-content">

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\john\Documents\Laravel-Appointments\resources\views/admin/employees/show.blade.php ENDPATH**/ ?>
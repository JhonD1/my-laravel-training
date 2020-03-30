<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <?php echo e(trans('global.show')); ?> <?php echo e(trans('cruds.task.title')); ?>

    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.task.fields.id')); ?>

                        </th>
                        <td>
                            <?php echo e($task->id); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.task.fields.title')); ?>

                        </th>
                        <td>
                            <?php echo e($task->title); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.task.fields.description')); ?>

                        </th>
                        <td>
                            <?php echo e($task->description); ?>

                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.task.fields.photo')); ?>

                        </th>
                        <td>
                            <?php echo e($task->photo); ?>

                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.task.fields.created_by')); ?>

                        </th>
                        <td>
                            <?php echo e($task->users()->pluck('name')->first()); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.task.fields.created_at')); ?>

                        </th>
                        <td>
                            <?php echo e($task->created_at); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.task.fields.updated_at')); ?>

                        </th>
                        <td>
                            <?php echo e($task->updated_at); ?>

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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\john\Documents\Laravel-Appointments\resources\views/admin/tasks/show.blade.php ENDPATH**/ ?>
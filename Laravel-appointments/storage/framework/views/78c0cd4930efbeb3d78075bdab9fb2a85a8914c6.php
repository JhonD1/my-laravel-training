<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('global.create')); ?> <?php echo e(trans('cruds.appointment.title_singular')); ?>

    </div>

    <div class="card-body">
        <form action="<?php echo e(route("admin.appointments.store")); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group <?php echo e($errors->has('client_id') ? 'has-error' : ''); ?>">
                <label for="client"><?php echo e(trans('cruds.appointment.fields.client')); ?>*</label>
                <select name="client_id" id="client" class="form-control select2" required>
                    <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($id); ?>" <?php echo e((isset($appointment) && $appointment->client ? $appointment->client->id : old('client_id')) == $id ? 'selected' : ''); ?>><?php echo e($client); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('client_id')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('client_id')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('employee_id') ? 'has-error' : ''); ?>">
                <label for="employee"><?php echo e(trans('cruds.appointment.fields.employee')); ?></label>
                <select name="employee_id" id="employee" class="form-control select2">
                    <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($id); ?>" <?php echo e((isset($appointment) && $appointment->employee ? $appointment->employee->id : old('employee_id')) == $id ? 'selected' : ''); ?>><?php echo e($employee); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('employee_id')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('employee_id')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('start_time') ? 'has-error' : ''); ?>">
                <label for="start_time"><?php echo e(trans('cruds.appointment.fields.start_time')); ?>*</label>
                <input type="text" id="start_time" name="start_time" class="form-control datetime" value="<?php echo e(old('start_time', isset($appointment) ? $appointment->start_time : '')); ?>" required>
                <?php if($errors->has('start_time')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('start_time')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('cruds.appointment.fields.start_time_helper')); ?>

                </p>
            </div>
            <div class="form-group <?php echo e($errors->has('finish_time') ? 'has-error' : ''); ?>">
                <label for="finish_time"><?php echo e(trans('cruds.appointment.fields.finish_time')); ?>*</label>
                <input type="text" id="finish_time" name="finish_time" class="form-control datetime" value="<?php echo e(old('finish_time', isset($appointment) ? $appointment->finish_time : '')); ?>" required>
                <?php if($errors->has('finish_time')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('finish_time')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('cruds.appointment.fields.finish_time_helper')); ?>

                </p>
            </div>
            <div class="form-group <?php echo e($errors->has('price') ? 'has-error' : ''); ?>">
                <label for="price"><?php echo e(trans('cruds.appointment.fields.price')); ?></label>
                <input type="number" id="price" name="price" class="form-control" value="<?php echo e(old('price', isset($appointment) ? $appointment->price : '')); ?>" step="0.01">
                <?php if($errors->has('price')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('price')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('cruds.appointment.fields.price_helper')); ?>

                </p>
            </div>
            <div class="form-group <?php echo e($errors->has('comments') ? 'has-error' : ''); ?>">
                <label for="comments"><?php echo e(trans('cruds.appointment.fields.comments')); ?></label>
                <textarea id="comments" name="comments" class="form-control "><?php echo e(old('comments', isset($appointment) ? $appointment->comments : '')); ?></textarea>
                <?php if($errors->has('comments')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('comments')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('cruds.appointment.fields.comments_helper')); ?>

                </p>
            </div>
            <div class="form-group <?php echo e($errors->has('services') ? 'has-error' : ''); ?>">
                <label for="services"><?php echo e(trans('cruds.appointment.fields.services')); ?>

                    <span class="btn btn-info btn-xs select-all"><?php echo e(trans('global.select_all')); ?></span>
                    <span class="btn btn-info btn-xs deselect-all"><?php echo e(trans('global.deselect_all')); ?></span></label>
                <select name="services[]" id="services" class="form-control select2" multiple="multiple">
                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $services): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($id); ?>" <?php echo e((in_array($id, old('services', [])) || isset($appointment) && $appointment->services->contains($id)) ? 'selected' : ''); ?>><?php echo e($services); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('services')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('services')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('cruds.appointment.fields.services_helper')); ?>

                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="<?php echo e(trans('global.save')); ?>">
            </div>
        </form>


    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\john\Documents\Laravel-Appointments\resources\views/admin/appointments/create.blade.php ENDPATH**/ ?>
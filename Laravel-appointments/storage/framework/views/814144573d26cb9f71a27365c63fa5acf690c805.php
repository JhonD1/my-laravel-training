<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('global.edit')); ?> <?php echo e(trans('cruds.task.title_singular')); ?>

    </div>

    <div class="card-body">
        <form action="<?php echo e(route("admin.tasks.update", [$task->id])); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="form-group <?php echo e($errors->has('title') ? 'has-error' : ''); ?>">
                <label for="title"><?php echo e(trans('cruds.task.fields.title')); ?></label>
                <input type="title" id="title" name="title" class="form-control" value="<?php echo e(old('title', isset($task) ? $task->title : '')); ?>">
                <?php if($errors->has('title')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('title')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('cruds.task.fields.title_helper')); ?>

                </p>
            </div>

            <div class="form-group <?php echo e($errors->has('description') ? 'has-error' : ''); ?>">
                <label for="description"><?php echo e(trans('cruds.task.fields.description')); ?></label>
                <input type="text" id="description" name="description" class="form-control" value="<?php echo e(old('description', isset($task) ? $task->description : '')); ?>">
                <?php if($errors->has('description')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('description')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('cruds.task.fields.description_helper')); ?>

                </p>
            </div>

            <div class="form-group <?php echo e($errors->has('photo') ? 'has-error' : ''); ?>">
                <label for="photo"><?php echo e(trans('cruds.task.fields.photo')); ?></label>
                <div class="needsclick dropzone" id="photo-dropzone">

                </div>
                <?php if($errors->has('photo')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('photo')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('cruds.task.fields.photo_helper')); ?>

                </p>
            </div>

             <div class="form-group <?php echo e($errors->has('users') ? 'has-error' : ''); ?>">
              <select class="form-control" id='user_id' name = "created_by" required>
                <?php $__currentLoopData = $user_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($user->id); ?>" <?php echo e((in_array($name ?? '', old('name', [])) || isset($user->name)) ? 'selected' : ''); ?>><?php echo e($user->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if($errors->has('user_id')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('user_id')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('cruds.task.fields.created_by_helper')); ?>

                </p>
              </select>
            </div>

            <div>
                <input class="btn btn-danger" type="submit" value="<?php echo e(trans('global.save')); ?>">
            </div>
        </form>


    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\john\Documents\Laravel-Appointments\resources\views/admin/tasks/edit.blade.php ENDPATH**/ ?>
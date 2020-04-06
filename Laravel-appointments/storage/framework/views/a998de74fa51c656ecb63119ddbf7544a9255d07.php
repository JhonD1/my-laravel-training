<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('global.create')); ?> <?php echo e(trans('cruds.task.title_singular')); ?>

    </div>

    <div class="card-body">
        <form action="<?php echo e(route("admin.tasks.store")); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group <?php echo e($errors->has('title') ? 'has-error' : ''); ?>">
                <label for="title"><?php echo e(trans('cruds.task.fields.title')); ?></label>
                <input type="title" id="title" name="title" class="form-control" value="<?php echo e(old('title', isset($task) ? $task->users()->title : '')); ?>">
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
                <textarea id="description" name="description" class="form-control "><?php echo e(old('description', isset($appointment) ? $appointment->description : '')); ?></textarea>
                <?php if($errors->has('description')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('description')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('cruds.task.fields.description_helper')); ?>

                </p>
            </div>

            <div class="form-group <?php echo e($errors->has('users') ? 'has-error' : ''); ?>">
                <label for="created_by"><?php echo e(trans('cruds.task.fields.created_by')); ?>

                <select class="form-control select2" id='user_id' name = "created_by" required>

                    <?php $__currentLoopData = $user_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($user->id); ?>" <?php echo e((in_array($id ?? '', old('user_id', [])) || isset($user_list)) ? 'selected' : ''); ?>><?php echo e($user->name); ?></option>
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

            <div class="form-group <?php echo e($errors->has('photo') ? 'has-error' : ''); ?>">
                <label for="photo"><?php echo e(trans('cruds.task.fields.photo')); ?></label><br />
                <input type="file" name="photo">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
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

           <div>
            
              <input style="margin:20px 20px;" class="btn btn-danger" type="submit" value="<?php echo e(trans('global.save')); ?>">
            
              <a style="margin-bottom:20px 20px;" class="btn btn-default" href="<?php echo e(route('admin.tasks.index')); ?>">
                  <?php echo e(trans('global.back_to_list')); ?>

              </a>
           </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\john\Documents\GitHub\my-laravel-training\Laravel-appointments\resources\views/admin/tasks/create.blade.php ENDPATH**/ ?>
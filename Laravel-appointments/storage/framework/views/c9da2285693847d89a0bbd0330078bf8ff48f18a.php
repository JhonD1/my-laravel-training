<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('global.create')); ?> <?php echo e(trans('cruds.employee.title_singular')); ?>

    </div>

    <div class="card-body">
        <form action="<?php echo e(route("admin.employees.store")); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                <label for="name"><?php echo e(trans('cruds.employee.fields.name')); ?>*</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo e(old('name', isset($employee) ? $employee->name : '')); ?>" required>
                <?php if($errors->has('name')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('name')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('cruds.employee.fields.name_helper')); ?>

                </p>
            </div>
            <div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                <label for="email"><?php echo e(trans('cruds.employee.fields.email')); ?></label>
                <input type="email" id="email" name="email" class="form-control" value="<?php echo e(old('email', isset($employee) ? $employee->email : '')); ?>">
                <?php if($errors->has('email')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('email')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('cruds.employee.fields.email_helper')); ?>

                </p>
            </div>
            <div class="form-group <?php echo e($errors->has('phone') ? 'has-error' : ''); ?>">
                <label for="phone"><?php echo e(trans('cruds.employee.fields.phone')); ?></label>
                <input type="text" id="phone" name="phone" class="form-control" value="<?php echo e(old('phone', isset($employee) ? $employee->phone : '')); ?>">
                <?php if($errors->has('phone')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('phone')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('cruds.employee.fields.phone_helper')); ?>

                </p>
            </div>
            <div class="form-group <?php echo e($errors->has('photo') ? 'has-error' : ''); ?>">
                <label for="photo"><?php echo e(trans('cruds.employee.fields.photo')); ?></label>
                <div class="needsclick dropzone" id="photo-dropzone">

                </div>
                <?php if($errors->has('photo')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('photo')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('cruds.employee.fields.photo_helper')); ?>

                </p>
            </div>
            <div class="form-group <?php echo e($errors->has('services') ? 'has-error' : ''); ?>">
                <label for="services"><?php echo e(trans('cruds.employee.fields.services')); ?>

                    <span class="btn btn-info btn-xs select-all"><?php echo e(trans('global.select_all')); ?></span>
                    <span class="btn btn-info btn-xs deselect-all"><?php echo e(trans('global.deselect_all')); ?></span></label>
                <select name="services[]" id="services" class="form-control select2" multiple="multiple">
                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $services): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($id); ?>" <?php echo e((in_array($id, old('services', [])) || isset($employee) && $employee->services->contains($id)) ? 'selected' : ''); ?>><?php echo e($services); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('services')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('services')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('cruds.employee.fields.services_helper')); ?>

                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="<?php echo e(trans('global.save')); ?>">
            </div>
        </form>


    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    Dropzone.options.photoDropzone = {
    url: '<?php echo e(route('admin.employees.storeMedia')); ?>',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="photo"]').remove()
      $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
<?php if(isset($employee) && $employee->photo): ?>
      var file = <?php echo json_encode($employee->photo); ?>

          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
<?php endif; ?>
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\john\Documents\Laravel-Appointments\resources\views/admin/employees/create.blade.php ENDPATH**/ ?>
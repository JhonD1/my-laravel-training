<?php $__env->startSection('content'); ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('employee_create')): ?>
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            
            <a class="btn btn-success" href="<?php echo e(route("admin.tasks.create")); ?>">
                <?php echo e(trans('global.add')); ?> <?php echo e(trans('cruds.task.title_singular')); ?>

            </a>

            
            <a style="margin-right:20px;" class="btn btn-danger" href="<?php echo e(route("admin.tasks.del")); ?>">Delete
            </a>

        </div>
    </div>
<?php endif; ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('cruds.task.title_singular')); ?> <?php echo e(trans('global.list')); ?>

    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Employee">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        <?php echo e(trans('cruds.task.fields.id')); ?>

                    </th>
                    <th>
                        <?php echo e(trans('cruds.task.fields.title')); ?>

                    </th>
                    <th>
                        <?php echo e(trans('cruds.task.fields.description')); ?>

                    </th>
                    <th>
                        <?php echo e(trans('cruds.task.fields.photo')); ?>

                    </th>
                    <th>
                        <?php echo e(trans('cruds.task.fields.created_by')); ?>

                    </th>
                    <th>
                        <?php echo e(trans('cruds.task.fields.created_at')); ?>

                    </th>
                    <th>
                        <?php echo e(trans('cruds.task.fields.updated_at')); ?>

                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td>
                    <form method="post" action="<?php echo e(route('admin.tasks.destroy', $task->id)); ?>">
                      <?php echo csrf_field(); ?>

                      <div class="checkbox">
                        <input type="checkbox" name="checked[]" value="<?php echo e($task->id); ?>"><label><?php echo e($task->name); ?></label>
                      </div>

                      </td>
                      <td>
                        <?php echo e($task->id); ?>

                      </td>
                      <td>
                        <?php echo e($task->title); ?>

                      </td>
                      <td>
                        <?php echo e($task->description); ?>

                      </td>
                      <td>
                        <?php echo e($task->photo); ?>

                      </td>
                      <td>
                        <?php echo e($task->users()->pluck('name')->first()); ?>

                      </td>
                      <td>
                        <?php echo e($task->created_at); ?>

                      </td>
                      <td>
                        <?php echo e($task->updated_at); ?>

                      </td>
                      <td>

                        
                        <a class="btn btn-xs btn-primary" href="<?php echo e(route('admin.tasks.show', $task->id)); ?>">
                            <?php echo e(trans('global.view')); ?>

                        </a>

                        
                        <a class="btn btn-xs btn-info" href="<?php echo e(route('admin.tasks.edit', $task->id)); ?>">
                            <?php echo e(trans('global.edit')); ?>

                        </a>

                        
                        
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <input type="submit" class="btn btn-xs btn-danger" value="<?php echo e(trans('global.delete')); ?>">
              
                      </td>

                  </td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <button class="btn btn-danger" type="submit">Del</button>
                </form>
            </tbody>
        </table>


    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
##parent-placeholder-16728d18790deb58b3b8c1df74f06e536b532695##
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

  let deleteButtonTrans = '<?php echo e(trans('global.datatables.delete')); ?>'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "<?php echo e(route('admin.roles.massDestroy')); ?>",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('<?php echo e(trans('global.datatables.zero_selected')); ?>')

        return
      }

      if (confirm('<?php echo e(trans('global.areYouSure')); ?>')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)


  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Role:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\john\Documents\GitHub\my-laravel-training\Laravel-appointments\resources\views/admin/tasks/index.blade.php ENDPATH**/ ?>
<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            <li class="nav-item">
                <a href="<?php echo e(route("admin.home")); ?>" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt">

                    </i>
                    <?php echo e(trans('global.dashboard')); ?>

                </a>
            </li>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_management_access')): ?>
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fas fa-users nav-icon">

                        </i>
                        <?php echo e(trans('cruds.userManagement.title')); ?>

                    </a>
                    <ul class="nav-dropdown-items">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission_access')): ?>
                            <li class="nav-item">
                                <a href="<?php echo e(route("admin.permissions.index")); ?>" class="nav-link <?php echo e(request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : ''); ?>">
                                    <i class="fas fa-unlock-alt nav-icon">

                                    </i>
                                    <?php echo e(trans('cruds.permission.title')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_access')): ?>
                            <li class="nav-item">
                                <a href="<?php echo e(route("admin.roles.index")); ?>" class="nav-link <?php echo e(request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : ''); ?>">
                                    <i class="fa-fw fas fa-briefcase nav-icon">

                                    </i>
                                    <?php echo e(trans('cruds.role.title')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_access')): ?>
                            <li class="nav-item">
                                <a href="<?php echo e(route("admin.users.index")); ?>" class="nav-link <?php echo e(request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : ''); ?>">
                                    <i class="fa-fw fas fa-user nav-icon">

                                    </i>
                                    <?php echo e(trans('cruds.user.title')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('service_access')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route("admin.services.index")); ?>" class="nav-link <?php echo e(request()->is('admin/services') || request()->is('admin/services/*') ? 'active' : ''); ?>">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        <?php echo e(trans('cruds.service.title')); ?>

                    </a>
                </li>
            <?php endif; ?>
                <li class="nav-item">
                    <a href="<?php echo e(route("admin.tasks.index")); ?>" class="nav-link <?php echo e(request()->is('admin/tasks') || request()->is('admin/tasks/*') ? 'active' : ''); ?>">
                        <i class="fa-fw fas fa-receipt nav-icon">

                        </i>
                        <?php echo e(trans('cruds.task.title')); ?>

                    </a>
                </li>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('employee_access')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route("admin.employees.index")); ?>" class="nav-link <?php echo e(request()->is('admin/employees') || request()->is('admin/employees/*') ? 'active' : ''); ?>">
                        <i class="fa-fw fas fa-user nav-icon">

                        </i>
                        <?php echo e(trans('cruds.employee.title')); ?>

                    </a>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('client_access')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route("admin.clients.index")); ?>" class="nav-link <?php echo e(request()->is('admin/clients') || request()->is('admin/clients/*') ? 'active' : ''); ?>">
                        <i class="fa-fw fas fa-users nav-icon">

                        </i>
                        <?php echo e(trans('cruds.client.title')); ?>

                    </a>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('appointment_access')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route("admin.appointments.index")); ?>" class="nav-link <?php echo e(request()->is('admin/appointments') || request()->is('admin/appointments/*') ? 'active' : ''); ?>">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        <?php echo e(trans('cruds.appointment.title')); ?>

                    </a>
                </li>
            <?php endif; ?>
            <li class="nav-item">
                <a href="<?php echo e(route("admin.systemCalendar")); ?>" class="nav-link <?php echo e(request()->is('admin/system-calendar') || request()->is('admin/system-calendar/*') ? 'active' : ''); ?>">
                    <i class="nav-icon fa-fw fas fa-calendar">

                    </i>
                    <?php echo e(trans('global.systemCalendar')); ?>

                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    <?php echo e(trans('global.logout')); ?>

                </a>
            </li>
        </ul>

    </nav>
    
    <div id="footer-section">
        <nav class="sidebar-nav">
            <ul class="nav">
                <li class="nav-item">
                    <a href="https://stgwww.ourshop.com/en/MYR/privacy-policy" target="_blank" class="nav-link">
                       Privacy Policy
                    </a>
                </li>
                <li class="nav-item">
                    <a href="https://stgwww.ourshop.com/en/MYR/acceptable-use-policy" target="_blank" class="nav-link">
                        Terms of Use
                    </a>
                </li>
                <li class="nav-item">
                    <a href="https://stgwww.ourshop.com/en/MYR/terms-and-conditions-seller " target="_blank" class="nav-link">
                        Terms and Conditions
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<?php /**PATH C:\Users\john\Documents\GitHub\my-laravel-training\Laravel-appointments\resources\views/partials/menu.blade.php ENDPATH**/ ?>
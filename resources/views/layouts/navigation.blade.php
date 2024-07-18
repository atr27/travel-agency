<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
                <a href="{{ route('admin.dashboard.index') }}" class="nav-link">
                    <i class="nav-icon fa fa-book"></i>
                    <p>
                        {{ __('Dashboard') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.sliders.index') }}" class="nav-link">
                    <i class="nav-icon fa fa-image"></i>
                    <p>
                        {{ __('Slider') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.destinations.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-map-marked-alt"></i>
                    <p>
                        {{ __('Destination') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.testimonials.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-comments"></i>
                    <p>
                        {{ __('Testimonials') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.settings.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-cog"></i>
                    <p>
                        {{ __('Settings') }}
                    </p>
                </a>
            </li>

            @can('user_management_access')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users nav-icon"></i>
                        <p>
                            {{ __('User Management') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}"
                                href="{{ route('admin.permissions.index') }}"> <i class="fa fa-briefcase mr-2"></i>
                                {{ __('Permissions') }}</a>
                            <a class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}"
                                href="{{ route('admin.roles.index') }}"><i class="fa fa-briefcase mr-2"></i>
                                {{ __('Roles') }}</a>
                            <a class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}"
                                href="{{ route('admin.users.index') }}"> <i class="fa fa-user mr-2"></i>
                                {{ __('Users') }}</a>
                        </li>
                    </ul>
                </li>
            @endcan



        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->

<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('identitum_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.identita.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/identita") || request()->is("admin/identita/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-id-card c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.identitum.title') }}
                </a>
            </li>
        @endcan
        @can('pengukuran_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.pengukurans.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/pengukurans") || request()->is("admin/pengukurans/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-file-medical-alt c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.pengukuran.title') }}
                </a>
            </li>
        @endcan
        @can('catatan_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.catatans.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/catatans") || request()->is("admin/catatans/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-book-open c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.catatan.title') }}
                </a>
            </li>
        @endcan
        @can('trik_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.triks.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/triks") || request()->is("admin/triks/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-lightbulb c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.trik.title') }}
                </a>
            </li>
        @endcan
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>
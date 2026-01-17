<nav class="mt-2">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('assets/admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">
                @auth
                    {{ Auth::user()->name }}
                @endauth
            </a>
        </div>
    </div>

    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview {{ request()->is('admin/genralsettings*') || request()->is('admin/finance_calenders*') || request()->is('admin/branches*') || request()->is('admin/Shift_types*') || request()->is('admin/Departments*') || request()->is('admin/qualifications*')? 'menu-open' : ''}}  ">
            <a href="#"
                class="nav-link {{ request()->is('admin/genralsettings*') || request()->is('admin/finance_calenders*') || request()->is('admin/branches*') || request()->is('admin/Shift_types*') || request()->is('admin/Departments*') || request()->is('admin/qualifications*')? 'active' : ''}}  ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    قائمة الضبط
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">

                <li class="nav-item">
                    <a href="{{ route('admin_panal_settings.index') }}"
                        class="nav-link {{ request()->is('admin/genralsettings*') ? 'active' : '' }} ">
                        <i class="far fa-gears  nav-icon"></i>
                        <p>الضبط العام
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('finance_calenders.index') }}"
                        class="nav-link {{ request()->is('admin/finance_calenders*') ? 'active' : '' }}">
                        <i class="far fa-steam-square  nav-icon"></i>
                        <p> السنوات المالية
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('branches.index') }}"
                        class="nav-link {{ request()->is('admin/branches*') ? 'active' : '' }}">
                        <i class="far fa-steam-square  nav-icon"></i>
                        <p> الفروع
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('shift_types.index') }}"
                        class="nav-link {{ request()->is('admin/Shift_types*') ? 'active' : '' }}">
                        <i class="far fa-steam-square  nav-icon"></i>
                        <p> أنواع الشفتات
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('departments.index') }}"
                        class="nav-link  {{ request()->is('admin/Departments*') ? 'active' : '' }}">
                        <i class="far fa-steam-square  nav-icon"></i>
                        <p> الأدارات
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('qualifications.index') }}"
                        class="nav-link  {{ request()->is('admin/qualifications*') ? 'active' : '' }}">
                        <i class="far fa-steam-square  nav-icon"></i>
                        <p> المؤهلات
                        </p>
                    </a>
                </li>

            </ul>
        </li>



    </ul>
</nav>

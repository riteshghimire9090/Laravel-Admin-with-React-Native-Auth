<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{url('/dashboard/')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{url('images/profile')}}/{{auth('admin')->user()->profile_pic}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{route("dashboard.profile")}}" class="d-block">{{auth('admin')->user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard

                        </p>
                    </a>

                </li>
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa fa-cog"></i>
                        <p>
                            Setting
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route("setting.general.edit")}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>General</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route("setting.api.edit")}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Api Keys</p>
                            </a>
                        </li>


                    </ul>
                </li>
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Users
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('admin.password.change') }}" class="nav-link ">
                                <i class="far fa fa-lock"></i>
                                <p>{{__("Change Password")}}</p>
                            </a>
                        </li>
                        @admin('super')
                        <li class="nav-item">
                            <a href="" class="nav-link ">
                                <i class="far fa fa-lock"></i>
                                <p>Backend User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route("front.user.index")}}" class="nav-link ">
                                <i class="far fa fa-lock"></i>
                                <p>Frontend User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.show') }}" class="nav-link ">
                                <i class="far fa fa-lock"></i>
                                <p>{{ucfirst(config('multiauth.prefix')) }}</p>
                            </a>
                        </li>
                        @permitToParent('Role')
                        <li class="nav-item">
                            <a href="{{ route('admin.roles') }}" class="nav-link ">
                                <i class="far fa fa-lock"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                        @endpermitToParent
                        @endadmin

                    </ul>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item menu-open">
        <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}" >
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Panel Administrativo</p>
        </a>
        </li>
        {{--Inicia li--}}
        <li class="nav-item {{ request()->is('admin/posts*') ? 'menu-open':'' }}">
            <a href="#" class="nav-link">
                <i class="nav-icon fa fa-bars"></i>
                <p>Crud Post
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="{{ route('admin.posts.index') }}" class="nav-link {{ request()->is('admin/posts') ? 'active':'' }}">
                    <i class="far fa-eye nav-icon"></i>
                    <p>Crud Posts</p>
                </a>
                </li>
                <li class="nav-item">
                <a href="#" data-toggle="modal" data-target="#myModal" class="nav-link {{ request()->is('admin/posts/create') ? 'active':'' }}">
                    <i class="fas fa-pencil-alt"></i>
                    <p>Crear Post</p>
                </a>
                </li>
            </ul>
        </li>
        @if(Auth::user()->hasRole('admin'))
            <li class="nav-item" {{ request()->is('admin/user*') ? 'menu-open':'' }}">
                <a href="" class="nav-link">
                    <i class="nav-icon fa fa-user"></i>
                    <p>Crud Users
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                    <a href="{{ route('admin.user.index') }}" class="nav-link {{ request()->is('admin/user') ? 'active':'' }}">
                        <i class="far fa-eye nav-icon"></i>
                        <p>Listado Usuarios</p>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="#" data-toggle="modal" class="nav-link">
                        <i class="fas fa-pencil-alt"></i>
                        <p>Crear Usuario</p>
                    </a>
                    </li>
                </ul>
            </li>
        @endif
        <li class="nav-item">
            <form method="post" action="{{ route('logout') }}">
                {{ csrf_field() }}
                <button class="btn btn-default btn-flat btn-block">Cerrar Sesión</button>
            </form>
        </li>
    </ul>
</nav>

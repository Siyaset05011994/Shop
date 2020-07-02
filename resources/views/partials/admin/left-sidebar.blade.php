<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.home')}}" class="brand-link" style="padding-left: 15px;opacity: 0.8">
        <i class="fa fa-shopping-basket" style="border: 1px solid #dee2e6;font-size: 25px;padding: 5px"></i>
        <span class="brand-text font-weight-light">Shop Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('admin.home')}}" class="nav-link">
                        <i class="fa fa-home"></i>&nbsp;&nbsp;&nbsp;
                        <p>
                            Home
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.category.index')}}" class="nav-link">
                        <i class="fa fa-list-alt"></i>&nbsp;&nbsp;&nbsp;
                        <p>
                            Categories
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.store.index')}}" class="nav-link">
                        <i class="fa fa-shopping-bag"></i>&nbsp;&nbsp;&nbsp;
                        <p>
                            Stores
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.product.index')}}" class="nav-link">
                        <i class="fa fa-product-hunt"></i>&nbsp;&nbsp;&nbsp;
                        <p>
                            Products
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="" class="nav-link">
                        <i class="fa fa-list"></i>&nbsp;&nbsp;&nbsp;
                        <p>
                            Parameters && Values
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.parameter.index')}}" class="nav-link">
                                <i class="fa fa-cog"></i>
                                <p> &nbsp;Parameters </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.parameter-value.index')}}" class="nav-link">
                                <i class="fa fa-key"></i>
                                <p> &nbsp;Values </p>
                            </a>
                        </li>

                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

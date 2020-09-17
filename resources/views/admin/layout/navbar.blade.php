<header class="main-header">
        <!-- Logo -->
        <a href="{{ aurl('') }}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top  " role="navigation"> 
        
            @if (direction() == 'ltr')
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
            @else

            <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
            @endif

            @include('admin.layout.menu')

        </nav>
</header>
    <!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar"> 
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
            <img src="{{url('/design/AdminLTE')}}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
            <p> {{admin()->user()->name}} </p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="#">
                    <i class="fas fa-tasks"></i> <span>{{atrans('Main')}}</span>
                    <span class="pull-right-container">
                    {{-- <i class="fa fa-angle-left pull-right"></i> --}}
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class=""><a href="{{aurl('')}}"><i class="fas fa-tachometer-alt"></i> {{atrans('dashboard')}} </a></li>
                    <li class=""><a href="{{aurl('settings')}}"><i class="fas fa-users-cog"></i> {{atrans('settings')}} </a></li>
                    <li class=""><a href="{{url('')}}"><i class="fas fa-star"></i> {{atrans('stor')}} </a></li>
                </ul>
            </li>
            <li class="treeview {{active_menu('admin')[0]}}">
                <a href="#">
                    <i class="fas fa-user-shield"></i>  <span>{{ atrans('admin') }}</span>
                    <span class="pull-right-container">
                        {{-- <i class="fa fa-angle-left pull-right"></i> --}}
                    </span>
                </a>
                <ul class="treeview-menu" style="{{active_menu('admin')[1]}}" >
                    <li class="{{active_help('create','admin')}}"><a href="{{aurl('admin')}}"><i class="fas fa-user-lock"></i> {{ atrans('admin') }}</a></li>
                    <li class="{{active_menu_s('create')[0]}}"><a href="{{aurl('admin/create')}}"><i class="fa fa-plus"></i> {{ atrans('add') }}</a></li>
                </ul>
            </li>


            <li class="treeview {{active_menu('users')[0]}}">
                <a href="#">
                    <i class="fa fa-users"></i> <span>{{ atrans('users') }}</span>
                    <span class="pull-right-container">
                    {{-- <i class="fa fa-angle-left pull-right"></i> --}}
                    </span>
                </a>
                <ul class="treeview-menu" style="{{active_menu('users')[1]}}">
                    <li class=""><a href="{{aurl('users')}}"><i class="fa fa-users"></i> {{ atrans('users') }}</a></li>
                    <li class=""><a href="{{aurl('users')}}?level=user"><i class="fa fa-user"></i> {{ atrans('user') }}</a></li>
                    <li class=""><a href="{{aurl('users')}}?level=vendor"><i class="fas fa-store-alt"></i> {{ atrans('vendor') }}</a></li>
                    <li class=""><a href="{{aurl('users')}}?level=company"><i class="fas fa-building"></i> {{ atrans('company') }}</a></li>
                </ul>
            </li>

            <li class="treeview {{active_menu('countries')[0]}}">
                <a href="#">
                    <i class="fas fa-globe-africa"></i> <span>  {{ atrans('countries') }} </span>
                    <span class="pull-right-container">
                    {{-- <i class="fa fa-angle-left pull-right"></i> --}}
                    </span>
                </a>
                <ul class="treeview-menu" style="{{active_menu('countries')[1]}}">
                    <li class="{{active_help('create','countries')}}"><a href="{{aurl('countries')}}"><i class="far fa-flag"></i> {{ atrans('countries') }}</a></li>
                    <li class="{{active_menu_s('create')[0]}}"><a href="{{aurl('countries/create')}}"><i class="fa fa-plus"></i> {{ atrans('add') }}</a></li>
                </ul>
            </li>

            <li class="treeview {{active_menu('cities')[0]}}">
                <a href="#">
                    <i class="fas fa-building"></i>  <span>  {{ atrans('cities') }} </span>
                    <span class="pull-right-container">
                    {{-- <i class="fa fa-angle-left pull-right"></i> --}}
                    </span>
                </a>
                <ul class="treeview-menu" style="{{active_menu('cities')[1]}}">
                    <li class="{{active_help('create','cities')}}"><a href="{{aurl('cities')}}"><i class="far fa-flag"></i> {{ atrans('cities') }}</a></li>
                    <li class="{{active_menu_s('create')[0]}}"><a href="{{aurl('cities/create')}}"><i class="fa fa-plus"></i> {{ atrans('add') }}</a></li>
                </ul>
            </li>

            <li class="treeview {{active_menu('state')[0]}}">
                <a href="#">
                    <i class="fas fa-city"></i> <span>  {{ atrans('state') }} </span>
                    <span class="pull-right-container">
                    {{-- <i class="fa fa-angle-left pull-right"></i> --}}
                    </span>
                </a>
                <ul class="treeview-menu" style="{{active_menu('state')[1]}}">
                    <li class="{{active_help('create','state')}}"><a href="{{aurl('state')}}"><i class="far fa-flag"></i> {{ atrans('state') }}</a></li>
                    <li class="{{active_menu_s('create')[0]}}"><a href="{{aurl('state/create')}}"><i class="fa fa-plus"></i> {{ atrans('add') }}</a></li>
                </ul>
            </li>

            <li class="treeview {{active_menu('descriptions')[0]}}">
                <a href="#">
                    <i class="fas fa-list"></i> <span>  {{ atrans('descriptions') }} </span>
                    <span class="pull-right-container">
                    {{-- <i class="fa fa-angle-left pull-right"></i> --}}
                    </span>
                </a>
                <ul class="treeview-menu" style="{{active_menu('departments')[1]}}">
                    <li class="{{active_help('create','departments')}}"><a href="{{aurl('departments')}}"><i class="far fa-flag"></i> {{ atrans('descriptions') }}</a></li>
                    <li class="{{active_menu_s('create')[0]}}"><a href="{{aurl('departments/create')}}"><i class="fa fa-plus"></i> {{ atrans('add') }}</a></li>
                </ul>
            </li>

            <li class="treeview {{active_menu('trademarks')[0]}}">
                <a href="#">
                    <i class="fa fa-cube"></i> <span>  {{ atrans('trademarks') }} </span>
                    <span class="pull-right-container">
                    {{-- <i class="fa fa-angle-left pull-right"></i> --}}
                    </span>
                </a>
                <ul class="treeview-menu" style="{{active_menu('trademarks')[1]}}">
                    <li class="{{active_help('create','trademarks')}}"><a href="{{aurl('trademarks')}}"><i class="fa fa-cube"></i> {{ atrans('trademarks') }}</a></li>
                    <li class="{{active_menu_s('create')[0]}}"><a href="{{aurl('trademarks/create')}}"><i class="fa fa-plus"></i> {{ atrans('add') }}</a></li>
                </ul>
            </li>

            <li class="treeview {{active_menu('maunfacturers')[0]}}">
                <a href="#">
                    <i class="fas fa-industry"></i> <span>  {{ atrans('maunfacturers') }} </span>
                    <span class="pull-right-container">
                    {{-- <i class="fa fa-angle-left pull-right"></i> --}}
                    </span>
                </a>
                <ul class="treeview-menu" style="{{active_menu('maunfacturers')[1]}}">
                    <li class="{{active_help('create','maunfacturers')}}"><a href="{{aurl('maunfacturers')}}"><i class="fas fa-industry"></i> {{ atrans('maunfacturers') }}</a></li>
                    <li class="{{active_menu_s('create')[0]}}"><a href="{{aurl('maunfacturers/create')}}"><i class="fa fa-plus"></i> {{ atrans('add') }}</a></li>
                </ul>
            </li>

            <li class="treeview {{active_menu('shippings')[0]}}">
                <a href="#">
                    <i class="fas fa-truck"></i> <span>  {{ atrans('shippings') }} </span>
                    <span class="pull-right-container">
                    {{-- <i class="fa fa-angle-left pull-right"></i> --}}
                    </span>
                </a>
                <ul class="treeview-menu" style="{{active_menu('shippings')[1]}}">
                    <li class="{{active_help('create','shippings')}}"><a href="{{aurl('shippings')}}"><i class="fas fa-truck"></i> {{ atrans('shippings') }}</a></li>
                    <li class="{{active_menu_s('create')[0]}}"><a href="{{aurl('shippings/create')}}"><i class="fa fa-plus"></i> {{ atrans('add') }}</a></li>
                </ul>
            </li>

            <li class="treeview {{active_menu('molls')[0]}}">
                <a href="#">
                    <i class="fas fa-store"></i> <span>  {{ atrans('molls') }} </span>
                    <span class="pull-right-container">
                    {{-- <i class="fa fa-angle-left pull-right"></i> --}}
                    </span>
                </a>
                <ul class="treeview-menu" style="{{active_menu('molls')[1]}}">
                    <li class="{{active_help('create','molls')}}"><a href="{{aurl('molls')}}"><i class="fas fa-store"></i> {{ atrans('molls') }}</a></li>
                    <li class="{{active_menu_s('create')[0]}}"><a href="{{aurl('molls/create')}}"><i class="fa fa-plus"></i> {{ atrans('add') }}</a></li>
                </ul>
            </li>

            <li class="treeview {{active_menu('colors')[0]}}">
                <a href="#">
                    <i class="fas fa-paint-brush"></i> <span>  {{ atrans('colors') }} </span>
                    <span class="pull-right-container">
                    {{-- <i class="fa fa-angle-left pull-right"></i> --}}
                    </span>
                </a>
                <ul class="treeview-menu" style="{{active_menu('colors')[1]}}">
                    <li class="{{active_help('create','colors')}}"><a href="{{aurl('colors')}}"><i class="fas fa-palette"></i> {{ atrans('colors') }}</a></li>
                    <li class="{{active_menu_s('create')[0]}}"><a href="{{aurl('colors/create')}}"><i class="fa fa-plus"></i> {{ atrans('add') }}</a></li>
                </ul>
            </li>

            <li class="treeview {{active_menu('size')[0]}}">
                <a href="#">
                    <i class="fas fa-info-circle"></i> <span>  {{ atrans('size') }} </span>
                    <span class="pull-right-container">
                    {{-- <i class="fa fa-angle-left pull-right"></i> --}}
                    </span>
                </a>
                <ul class="treeview-menu" style="{{active_menu('size')[1]}}">
                    <li class="{{active_help('create','size')}}"><a href="{{aurl('size')}}"><i class="fas fa-info-circle"></i> {{ atrans('size') }}</a></li>
                    <li class="{{active_menu_s('create')[0]}}"><a href="{{aurl('size/create')}}"><i class="fa fa-plus"></i> {{ atrans('add') }}</a></li>
                </ul>
            </li>

            <li class="treeview {{active_menu('weight')[0]}}">
                <a href="#">
                    <i class="fas fa-info-circle"></i> <span>  {{ atrans('weight') }} </span>
                    <span class="pull-right-container">
                    {{-- <i class="fa fa-angle-left pull-right"></i> --}}
                    </span>
                </a>
                <ul class="treeview-menu" style="{{active_menu('weight')[1]}}">
                    <li class="{{active_help('create','weight')}}"><a href="{{aurl('weight')}}"><i class="fas fa-info-circle"></i> {{ atrans('weight') }}</a></li>
                    <li class="{{active_menu_s('create')[0]}}"><a href="{{aurl('weight/create')}}"><i class="fa fa-plus"></i> {{ atrans('add') }}</a></li>
                </ul>
            </li>

            <li class="treeview {{active_menu('prodacts')[0]}}">
                <a href="#">
                    <i class="fas fa-tag"></i> <span>  {{ atrans('prodacts') }} </span>
                    <span class="pull-right-container">
                    {{-- <i class="fa fa-angle-left pull-right"></i> --}}
                    </span>
                </a>
                <ul class="treeview-menu" style="{{active_menu('prodacts')[1]}}">
                    <li class="{{active_help('create','prodacts')}}"><a href="{{aurl('prodacts')}}"><i class="fas fa-tag"></i> {{ atrans('prodacts') }}</a></li>
                    <li class="{{active_menu_s('create')[0]}}"><a href="{{aurl('prodacts/create')}}"><i class="fa fa-plus"></i> {{ atrans('add') }}</a></li>
                    <li class="{{active_menu_s('create')[0]}}"><a href="{{aurl('prodacts/soft/deleted')}}"><i class="fas fa-sort"></i> {{ atrans('soft_deleted') }}</a></li>
                </ul>
            </li>













            {{-- <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>Layout Options</span>
                    <span class="pull-right-container">
                    <span class="label label-primary pull-right">4</span>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
                    <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
                    <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
                    <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
                </ul>
            </li> --}}
            {{-- <li>
                <a href="pages/widgets.html">
                    <i class="fa fa-th"></i> <span>Widgets</span>
                    <span class="pull-right-container">
                    <small class="label pull-right bg-green">new</small>
                    </span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Charts</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
                    <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
                    <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
                    <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>UI Elements</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
                    <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
                    <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
                    <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
                    <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
                    <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Forms</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
                    <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
                    <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Tables</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
                    <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
                </ul>
            </li>
            <li>
                <a href="pages/calendar.html">
                    <i class="fa fa-calendar"></i> <span>Calendar</span>
                    <span class="pull-right-container">
                    <small class="label pull-right bg-red">3</small>
                    <small class="label pull-right bg-blue">17</small>
                    </span>
                </a>
            </li>
            <li>
                <a href="pages/mailbox/mailbox.html">
                    <i class="fa fa-envelope"></i> <span>Mailbox</span>
                    <span class="pull-right-container">
                    <small class="label pull-right bg-yellow">12</small>
                    <small class="label pull-right bg-green">16</small>
                    <small class="label pull-right bg-red">5</small>
                    </span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Examples</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
                    <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
                    <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
                    <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
                    <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
                    <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
                    <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
                    <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
                    <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Multilevel</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                    <li class="treeview">
                    <a href="#"><i class="fa fa-circle-o"></i> Level One
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                        <li class="treeview">
                        <a href="#"><i class="fa fa-circle-o"></i> Level Two
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                            <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                        </ul>
                        </li>
                    </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                </ul>
            </li> --}}
            {{-- <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> --}}
        </ul>
    </section>
    <!-- /.sidebar -->
</aside> 
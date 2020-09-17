@include('admin.layout.header')
@include('admin.layout.navbar')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <section class="content-header">
        <h1>
            {{ atrans('dashboard') }}

            <small>{{ atrans('control_panel') }}</small>
        </h1>
        <ol class="breadcrumb" style="{{active_menu('')[1]}}">
            <li class=" btn btn-sm"><a href="{{ aurl('') }}" ><i class="fas fa-tachometer-alt"></i> {{ atrans('Home') }} </a></li>
            @yield('head')
        </ol>

    </section>

    <!-- Main content -->
    <section class="content">
        @include('admin.layout.message') 
        @yield('content')
    </section>
    <!-- /.content -->
</div>

@include('admin.layout.footer')



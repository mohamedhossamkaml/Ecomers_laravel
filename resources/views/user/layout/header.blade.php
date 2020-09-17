<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> {{ !empty($title)?$title:trans('admin.adminpanle') }} </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('css')
    
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{url('/design/AdminLTE')}}/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('')}}/design/AdminLTE/bower_components/font-awesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{url('')}}/design/AdminLTE/bower_components/font-awesome/css/all.min.css">
    
    <link rel="stylesheet" href="{{url('')}}/design/AdminLTE/bower_components/font-awesome/css/brands.min.css">
    <link rel="stylesheet" href="{{url('')}}/design/AdminLTE/bower_components/font-awesome/css/solid.min.css">
    <link rel="stylesheet" href="{{url('')}}/design/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{url('')}}/design/AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
    @if (direction() == 'ltr')
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('')}}/design/AdminLTE/dist/css/AdminLTE.min.css">
    @else
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('')}}/design/AdminLTE/dist/css/rtl/AdminLTE.css">
    <link rel="stylesheet" href="{{url('')}}/design/AdminLTE/dist/css/rtl/bootstrap-rtl.min.css">
    <link rel="stylesheet" href="{{url('')}}/design/AdminLTE/dist/css/rtl/profile.css">
      <link rel="stylesheet" href="{{url('')}}/design/AdminLTE/dist/css/rtl/rtl.css">
      <!-- Ionicons 2.0.0 -->
      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <!-- iCheck -->
      <link rel="stylesheet" href="{{url('')}}/design/AdminLTE/pluginsrtl/iCheck/flat/blue.css">
      <!-- jvectormap -->
      <link rel="stylesheet" href="{{url('')}}/design/AdminLTE/pluginsrtl/jvectormap/jquery-jvectormap-1.2.2.css">
      
      <!-- Date Picker -->
      {{-- <link rel="stylesheet" href="{{url('')}}/design/AdminLTE/pluginsrtl/datepicker/datepicker3.css"> --}}
      <!-- Daterange picker -->
      <link rel="stylesheet" href="{{url('')}}/design/AdminLTE/pluginsrtl/daterangepicker/daterangepicker-bs3.css">
      <style type="text/css">
        html,body,.alert,h1,h2,h3,h4,h5,h6
        {
          font-family: 'Open Sans', sans-serif;
        }
      </style>
    @endif
    
    
    
    <!-- AdminLTE Skins. Choose a skin from the css/skins
      folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="{{url('')}}/design/AdminLTE/dist/css/skins/_all-skins.min.css">
      <link rel="stylesheet" href="{{url('')}}/design/adminlt/jstree/themes/default/style.css">
      
      <!-- Morris chart -->
      <link rel="stylesheet" href="{{url('')}}/design/AdminLTE/bower_components/morris.js/morris.css">
      <!-- jvectormap -->
      <link rel="stylesheet" href="{{url('')}}/design/AdminLTE/bower_components/jvectormap/jquery-jvectormap.css">
      <!-- Date Picker -->
      <link rel="stylesheet" href="{{url('')}}/design/AdminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
      <!-- Daterange picker -->
      <link rel="stylesheet" href="{{url('')}}/design/AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.css">
      <!-- bootstrap wysihtml5 - text editor -->
      <link rel="stylesheet" href="{{url('')}}/design/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
      <!-- DataTables -->
      <link rel="stylesheet" href="{{url('')}}/design/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
      {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css"> --}}
      
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      
      <!-- Google Font -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
      
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css"  /> 

      
      
      {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.min.css"> --}}
      
    
  
    {{-- <link rel="stylesheet" href="dist/fonts/fonts-fa.css">
      <link rel="stylesheet" href="dist/css/bootstrap-rtl.min.css">
      <link rel="stylesheet" href="dist/css/rtl.css"> --}}
      
  </head>
  <body class="hold-transition skin-blue sidebar-mini "> 
    <div class="wrapper">
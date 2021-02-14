<!DOCTYPE html>
<!--
ustora by freshdesignweb.com
Twitter: https://twitter.com/freshdesignweb
URL: https://www.freshdesignweb.com/ustora/
-->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Ustora Demo</title>
        {{-- <link rel="stylesheet" href="{{ url('') }}/css/app.css"  /> --}}
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ url('design/adminlt') }}/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- SweetAlert2 -->
        <link rel="stylesheet" href="{{ url('design/adminlt') }}/plugins/sweetalert2/sweetalert2.min.css">
        <!-- Toastr -->
        <link rel="stylesheet" href="{{ url('design/adminlt') }}/plugins/toastr/toastr.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ url('design/adminlt') }}/dist/css/adminlteAs.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <!-- Google Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{ url('design/style') }}/css/bootstrap.min.css">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ url('design/style') }}/css/font-awesome.min.css">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{ url('design/style') }}/css/owl.carousel.css">
        <link rel="stylesheet" href="{{ url('design/style') }}/style.css">
        <link rel="stylesheet" href="{{ url('design/style') }}/css/responsive.css">
        @if (lang() == 'ar')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.css">
        @endif

        {{-- <link rel="icon" href="{{ Storage::url(setting()->logo) }}"> --}}
            <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
    </head>
    <body class="">



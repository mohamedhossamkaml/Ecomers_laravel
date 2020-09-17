@extends('admin.index')
@section('head')
    <li class="active btn btn-secondary btn-sm"><a href="{{ aurl('users') }}"> <i class="fa fa-users"></i> {{ atrans('users') }} </a></li>
    <li class="btn btn-info btn-sm"><a href="{{ aurl('users')}}?level=user"><i class="fa fa-user"></i> {{ atrans('user') }} </a></li>
    <li class="btn btn-primary btn-sm"><a href="{{ aurl('users')}}?level=vendor"><i class="fas fa-store-alt"></i> {{ atrans('vendor') }} </a></li>
    <li class="btn btn-success btn-sm"><a href="{{ aurl('users')}}?level=company"><i class="fas fa-building"></i> {{ atrans('company') }} </a></li>
@endsection
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"> {{ $title }} </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    
        {!! Form::open(['url'=>aurl('users')]) !!}
        <div class="form-group">
            {!! Form::label('name', atrans('name') ) !!}
            {!! Form::text('name', old('name'),['class'=>'form-control'] )!!}
        </div>

        <div class="form-group">
            {!! Form::label('email', atrans('email') ) !!}
            {!! Form::email('email', old('email'),['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password', atrans('password') ) !!}
            {!! Form::password('password',['class'=>'form-control'] )!!}
        </div>
        
        <div class="form-group">
            {!! Form::label('level', atrans('level') ) !!}
            {!! Form::select('level',
            [
                'user'=>atrans('user'),
                'company'=>atrans('company'),
                'vendor'=>atrans('vendor'),
            ],
                old('level'),
            ['class'=>'form-control','placeholder'=>'.....'] )!!}
        </div>
        {!! Form::submit(atrans('add'), ['class'=>'btn btn-primary'] ) !!}
        {!! Form::close() !!}

    </div>
    <!-- /.box-body -->
</div>





@endsection
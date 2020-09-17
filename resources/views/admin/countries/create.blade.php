@extends('admin.index')
@section('head')
    <li class="active btn btn-info btn-sm"><a href="{{ aurl('countries') }}" > <i class="fas fa-globe-africa"></i> {{ atrans('countries') }} </a></li>
@endsection
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"> {{ $title }} </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    
        {!! Form::open(['url'=>aurl('countries') ,'files'=>true ]) !!}
        <div class="form-group">
            {!! Form::label('country_name_ar', atrans('country_name_ar') ) !!}
            {!! Form::text('country_name_ar', old('country_name_ar'),['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('country_name_en', atrans('country_name_en') ) !!}
            {!! Form::text('country_name_en', old('country_name_en'),['class'=>'form-control'] )!!}
        </div>
        <div class="form-group">
            {!! Form::label('code', atrans('code') ) !!}
            {!! Form::text('code', old('code'),['class'=>'form-control'] )!!}
        </div>
        <div class="form-group">
            {!! Form::label('mob', atrans('mob') ) !!}
            {!! Form::text('mob', old('mob'),['class'=>'form-control'] )!!}
        </div>
        <div class="form-group">
            {!! Form::label('currency', atrans('currency') ) !!}
            {!! Form::text('currency', old('currency'),['class'=>'form-control'] )!!}
        </div>
        <div class="form-group">
            {!! Form::label('logo', atrans('country_flag') ) !!}
            {!! Form::file('logo',['class'=>'form-control'] )!!}
        </div>

        {!! Form::submit(atrans('add'), ['class'=>'btn btn-primary'] ) !!}
        {!! Form::close() !!}

    </div>
    <!-- /.box-body -->
</div>





@endsection
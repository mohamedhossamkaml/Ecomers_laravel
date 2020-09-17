@extends('admin.index')
@section('head')
    <li class="active btn btn-info btn-sm"><a href="{{ aurl('trademarks') }}" > <i class="fa fa-cube"></i> {{ atrans('trademarks') }} </a></li>
@endsection
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"> {{ $title }} </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    
        {!! Form::open(['url'=>aurl('trademarks') ,'files'=>true ]) !!}
        <div class="form-group">
            {!! Form::label('name_ar', atrans('name_ar') ) !!}
            {!! Form::text('name_ar', old('name_ar'),['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('name_en', atrans('name_en') ) !!}
            {!! Form::text('name_en', old('name_en'),['class'=>'form-control'] )!!}
        </div>
        <div class="form-group">
            {!! Form::label('logo', atrans('logo') ) !!}
            {!! Form::file('logo',['class'=>'form-control'] )!!}
        </div>

        {!! Form::submit(atrans('add'), ['class'=>'btn btn-primary'] ) !!}
        {!! Form::close() !!}

    </div>
    <!-- /.box-body -->
</div>





@endsection
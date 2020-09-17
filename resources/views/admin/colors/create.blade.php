@extends('admin.index')
@section('head')
    <li class="{{active_menu_s('create')[0]}} btn btn-info"><a href="{{ aurl('colors') }}" ><i class="fas fa-paint-brush"></i> {{ atrans('colors') }} </a></li>
@endsection
@section('content')



<div class="box">
    <div class="box-header">
        <h3 class="box-title"> {{ $title }} </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    
        {!! Form::open(['url'=>aurl('colors')]) !!}

        <div class="form-group">
            {!! Form::label('name_ar', atrans('color_name_ar') ) !!}
            {!! Form::text('name_ar', old('color_name_ar'),['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('name_en', atrans('color_name_en') ) !!}
            {!! Form::text('name_en', old('color_name_en'),['class'=>'form-control'] )!!}
        </div>
        <div class="form-group">
            {!! Form::label('color', atrans('color') ) !!}
            {!! Form::color('color', old('color'),['class'=>'form-control'] )!!}
        </div>

        {!! Form::submit(atrans('add'), ['class'=>'btn btn-primary'] ) !!}
        {!! Form::close() !!}

    </div>
    <!-- /.box-body -->
</div>


@endsection
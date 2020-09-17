@extends('admin.index')
@section('head')
    <li class="active btn btn-info"><a href="{{ aurl('colors') }}" ><i class="fas fa-paint-brush"></i> {{ atrans('colors') }} </a></li>
@endsection
@section('content')


<div class="box">
    <div class="box-header">
        <h3 class="box-title"> {{ $title }} </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    
        {!! Form::open(['url'=>aurl('colors/'.$color->id), 'method'=>'put']) !!}


        <div class="form-group">
            {!! Form::label('name_ar', atrans('name_ar') ) !!}
            {!! Form::text('name_ar',$color->name_ar,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('name_en', atrans('name_en') ) !!}
            {!! Form::text('name_en', $color->name_en,['class'=>'form-control'] )!!}
        </div>


        <div class="form-group">
            {!! Form::label('color', atrans('color') ) !!}
            {!! Form::color('color', $color->color,['class'=>'form-control'] )!!}
        </div>



        {!! Form::submit(atrans('save'), ['class'=>'btn btn-primary'] ) !!}
        {!! Form::close() !!}

    </div>
    <!-- /.box-body -->
</div>





@endsection
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
    
        {!! Form::open(['url'=>aurl('trademarks/'.$trademark->id), 'method'=>'put','files'=>true]) !!}

        <div class="form-group">
            {!! Form::label('name_ar', atrans('name_ar') ) !!}
            {!! Form::text('name_ar',$trademark->name_ar,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('name_en', atrans('name_en') ) !!}
            {!! Form::text('name_en', $trademark->name_en,['class'=>'form-control'] )!!}
        </div>
        <div class="form-group">
            {!! Form::label('logo', atrans('logo') ) !!}
            {!! Form::file('logo',['class'=>'form-control'] )!!}
            @if (!empty($trademark->logo))
                <img src=" {{Storage::url($trademark->logo)}}" style="width: 50px; hieght:50px" alt=""/>
            @endif
        </div>


        {!! Form::submit(atrans('save'), ['class'=>'btn btn-primary'] ) !!}
        {!! Form::close() !!}

    </div>
    <!-- /.box-body -->
</div>





@endsection
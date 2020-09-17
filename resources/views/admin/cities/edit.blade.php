@extends('admin.index')
@section('head')
    <li class="active btn btn-info btn-sm"><a href="{{ aurl('cities') }}" > <i class="fas fa-building"></i> {{ atrans('cities') }} </a></li>
@endsection
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"> {{ $title }} </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    
        {!! Form::open(['url'=>aurl('cities/'.$city->id), 'method'=>'put']) !!}

        <div class="form-group">
            {!! Form::label('city_name_ar', atrans('city_name_ar') ) !!}
            {!! Form::text('city_name_ar',$city->city_name_ar,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('city_name_en', atrans('city_name_en') ) !!}
            {!! Form::text('city_name_en', $city->city_name_en,['class'=>'form-control'] )!!}
        </div>
        <div class="form-group">
            {!! Form::label('country_id', atrans('country_id') ) !!}
            {!! Form::select('country_id',App\Model\Country::pluck('country_name_'.session('lang'),'id') , old('country_id'),['class'=>'form-control'] )!!}
        </div>



        {!! Form::submit(atrans('save'), ['class'=>'btn btn-primary'] ) !!}
        {!! Form::close() !!}

    </div>
    <!-- /.box-body -->
</div>





@endsection
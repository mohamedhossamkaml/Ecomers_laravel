@extends('admin.index')
@section('head')
    <li class="active btn btn-info"><a href="{{ aurl('weight') }}" ><i class="fas fa-paint-brush"></i> {{ atrans('weight') }} </a></li>
@endsection
@section('content')


<div class="box">
    <div class="box-header">
        <h3 class="box-title"> {{ $title }} </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    
        {!! Form::open(['url'=>aurl('weight/'.$weight->id), 'method'=>'put']) !!}


        <div class="form-group">
            {!! Form::label('name_ar', atrans('weight_name_ar') ) !!}
            {!! Form::text('name_ar',$weight->name_ar,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('name_en', atrans('weight_name_en') ) !!}
            {!! Form::text('name_en', $weight->name_en,['class'=>'form-control'] )!!}
        </div>


        {!! Form::submit(atrans('save'), ['class'=>'btn btn-primary'] ) !!}
        {!! Form::close() !!}

    </div>
    <!-- /.box-body -->
</div>





@endsection
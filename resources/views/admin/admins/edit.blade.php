@extends('admin.index')
@section('head')
    <li class="active btn btn-info btn-sm"><a href="{{ aurl('admin') }}" ><i class="fas fa-users-cog"></i> {{ atrans('admin') }} </a></li>
@endsection
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"> {{ $title }} </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        {!! Form::open(['url'=>aurl('admin/'.$admin->id), 'method'=>'put']) !!}
        <div class="form-group">
            {!! Form::label('frist_name', atrans('frist_name') ) !!}
            {!! Form::text('frist_name',$admin->frist_name,['class'=>'form-control'] )!!}
        </div>
        <div class="form-group">
            {!! Form::label('last_name', atrans('last_name') ) !!}
            {!! Form::text('last_name',$admin->last_name,['class'=>'form-control'] )!!}
        </div>
        <div class="form-group">
            {!! Form::label('email', atrans('email') ) !!}
            {!! Form::email('email', $admin->email,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password', atrans('password') ) !!}
            {!! Form::password('password',['class'=>'form-control'] )!!}
        </div>
        <div class="form-group">
            {!! Form::label('group_id', atrans('group_id') ) !!}
            {!! Form::select('group_id',App\Model\admingroup::pluck('name','id'),$admin->group_id,['class'=>'form-control address','placeholder'=>'-------'] )!!}
        </div>
        {!! Form::submit(atrans('save'), ['class'=>'btn btn-primary'] ) !!}
        {!! Form::close() !!}

    </div>
    <!-- /.box-body -->
</div>





@endsection

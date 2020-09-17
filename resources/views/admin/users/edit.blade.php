@extends('admin.index')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"> {{ $title }} </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    
        {!! Form::open(['url'=>aurl('users/'.$users->id), 'method'=>'put']) !!}
        <div class="form-group">
            {!! Form::label('name', atrans('name') ) !!}
            {!! Form::text('name',$users->name,['class'=>'form-control'] )!!}
        </div>

        <div class="form-group">
            {!! Form::label('email', atrans('email') ) !!}
            {!! Form::email('email', $users->email,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password', atrans('password') ) !!}
            {!! Form::password('password',['class'=>'form-control'] )!!}
        </div>

        <div class="form-group">
            {!! Form::label('level', atrans('password') ) !!}
            {!! Form::select('level',
            [
                'user'=>atrans('user'),
                'company'=>atrans('company'),
                'vendor'=>atrans('vendor'),
            ],
            $users->level,
            ['class'=>'form-control','placeholder'=>'.....'] )!!}
        </div>

        {!! Form::submit(atrans('save'), ['class'=>'btn btn-primary'] ) !!}
        {!! Form::close() !!}

    </div>
    <!-- /.box-body -->
</div>





@endsection
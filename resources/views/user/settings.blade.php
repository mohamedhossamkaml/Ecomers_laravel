@extends('admin.index')
@section('content')

<div class="box">
    <div class="box-header">
        <h3 class="box-title"> {{ $title }} </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    
        {!! Form::open(['url'=>aurl('settings'),'files'=>true]) !!}
        
        
        <div class="form-group">
            {!! Form::label('sitename_ar', atrans('sitename_ar') ) !!}
            {!! Form::text('sitename_ar',setting()->sitename_ar,['class'=>'form-control'] )!!}
        </div>
        
        <div class="form-group">
            {!! Form::label('sitename_en', atrans('sitename_en') ) !!}
            {!! Form::text('sitename_en',setting()->sitename_en,['class'=>'form-control'] )!!}
        </div>

        <div class="form-group">
            {!! Form::label('email', atrans('email') ) !!}
            {!! Form::email('email', setting()->email ,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('logo', atrans('logo') ) !!}
            {!! Form::file('logo', ['class'=>'form-control']) !!}
            @if (!empty(setting()->logo))
                <img src=" {{Storage::url(setting()->logo)}}" style="width: 50px; hieght:50px"  alt=""/>
            @endif
        </div>

        <div class="form-group">
            {!! Form::label('icon', atrans('icon') ) !!}
            {!! Form::file('icon', ['class'=>'form-control']) !!}
            @if (!empty(setting()->icon))
                <img src=" {{Storage::url(setting()->icon)}}" style="width: 50px; hieght:50px" alt=""/>
            @endif
        </div>

        <div class="form-group">
            {!! Form::label('description', atrans('description') ) !!}
            {!! Form::textarea('description', setting()->description,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('keywordes', atrans('keywordes') ) !!}
            {!! Form::textarea('keywordes', setting()->keywordes,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('main_lang', atrans('main_lang') ) !!}
            {!! Form::select('main_lang',['ar'=>atrans('ar'),'en'=>atrans('en')], setting()->main_lang,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('status', atrans('status') ) !!}
            {!! Form::select('status',['open'=>atrans('open'),'close'=>atrans('close')], setting()->status,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('message_maintenance', atrans('message_maintenance') ) !!}
            {!! Form::textarea('message_maintenance', setting()->message_maintenance,['class'=>'form-control']) !!}
        </div>



        {!! Form::submit(atrans('save'), ['class'=>'btn btn-primary'] ) !!}
        {!! Form::close() !!}

    </div>
    <!-- /.box-body -->
</div>



@endsection



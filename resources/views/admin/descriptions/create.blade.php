@extends('admin.index')
@section('content')

@push('js')
    <script>
        $(document).ready(function()
        {
            $('#jstree').jstree({
                "core" : { 
                    'data' : {!! load_dep(old('parent')) !!},
                    "themes" : {
                    "variant" : "large"
                    }
                },
                "checkbox" : {
                    "keep_selected_style" : false
                },
                "plugins" : [ "wholerow" ]
            });

        });
        $('#jstree').on('changed.jstree',function(e,data){

            var i,j,r =[];

            for ( i = 0, j = data.selected.length; i < j; i++ ) 
            {
                r.push(data.instance.get_node(data.selected[i]).id );
                
            }

            $('.parent_id').val(r.join(', '));
        });
    </script>
@endpush

<div class="box">
    <div class="box-header">
        <h3 class="box-title"> {{ $title }} </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    
        {!! Form::open(['url'=>aurl('departments') ,'files'=>true  ]) !!}
        <div class="form-group">
            {!! Form::label('dep_name_ar', atrans('dep_name_ar') ) !!}
            {!! Form::text('dep_name_ar', old('dep_name_ar'),['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('dep_name_en', atrans('dep_name_en') ) !!}
            {!! Form::text('dep_name_en', old('dep_name_en'),['class'=>'form-control'] )!!}
        </div>

        <div class="clearfix"></div>
        <div id="jstree"></div>
        <input type="hidden" name="parent" class="parent_id" value="{{ old('parent') }}">
        <div class="clearfix"></div>

        <div class="form-group">
            {!! Form::label('description', atrans('description') ) !!}
            {!! Form::textarea('description', old('description'),['class'=>'form-control'] )!!}
        </div>

        <div class="form-group">
            {!! Form::label('keyword', atrans('keyword') ) !!}
            {!! Form::textarea('keyword', old('keyword'),['class'=>'form-control'] )!!}
        </div>

        <div class="form-group">
            {!! Form::label('icon', atrans('icon') ) !!} 
            {!! Form::file('icon',['class'=>'form-control'] )!!}
        </div>

        {!! Form::submit(atrans('add'), ['class'=>'btn btn-primary'] ) !!}
        {!! Form::close() !!}

    </div>
    <!-- /.box-body -->
</div>





@endsection
@extends('admin.index')
@section('head')
    <li class="{{active_menu_s('create')[0]}} btn btn-info"><a href="{{ aurl('size') }}" ><i class="fas fa-paint-brush"></i> {{ atrans('size') }} </a></li>
@endsection
@section('content')




@push('js')


    <script>
        $(document).ready(function()
        {
            $('#jstree').jstree({
                "core" : {
                    'data' : {!! load_dep(old('department_id')) !!},
                    "themes" : {
                    "variant" : "large"
                    }
                },
                "checkbox" : {
                    "keep_selected_style" : true
                },
                "plugins" : [ "wholerow"]
                });
        });
        $('#jstree').on('changed.jstree',function(e,data){

        var i,j,r =[];
        var name =[];

        for ( i = 0, j = data.selected.length; i < j; i++ ) 
        {
            r.push(data.instance.get_node(data.selected[i]).id );
            
        }

        if (r.join != '') 
        {
            $('.department_id').val(r.join(', '));
        }

        

        });
    </script>
@endpush




<div class="box">
    <div class="box-header">
        <h3 class="box-title"> {{ $title }} </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    
        {!! Form::open(['url'=>aurl('size')]) !!}

        <div class="form-group">
            {!! Form::label('name_ar', atrans('color_name_ar') ) !!}
            {!! Form::text('name_ar', old('color_name_ar'),['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('name_en', atrans('color_name_en') ) !!}
            {!! Form::text('name_en', old('color_name_en'),['class'=>'form-control'] )!!}
        </div>

        <div class="form-group">
            {!! Form::label('is_public', atrans('is_public') ) !!}
            {!! Form::select('is_public',['yes'=>atrans('yes'),'no'=>atrans('no')], old('is_public'),['class'=>'form-control'] )!!}
        </div>


        <input type="hidden" name="department_id" class="department_id" value="{{ old('department_id') }}">
        <div id="jstree"></div>

        {!! Form::submit(atrans('add'), ['class'=>'btn btn-primary'] ) !!}
        {!! Form::close() !!}

    </div>
    <!-- /.box-body -->
</div>


@endsection
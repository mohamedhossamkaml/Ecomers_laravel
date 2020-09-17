@extends('admin.index')
@section('head')
    <li class="active btn btn-info"><a href="{{ aurl('size') }}" ><i class="fas fa-paint-brush"></i> {{ atrans('size') }} </a></li>
@endsection
@section('content')



@push('js')

    <script>
        $(document).ready(function()
        {
            $('#jstree').jstree({
                "core" : {
                    'data' : {!! load_dep($size->department_id) !!},
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
    
        {!! Form::open(['url'=>aurl('size/'.$size->id), 'method'=>'put']) !!}


        <div class="form-group">
            {!! Form::label('name_ar', atrans('name_ar') ) !!}
            {!! Form::text('name_ar',$size->name_ar,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('name_en', atrans('name_en') ) !!}
            {!! Form::text('name_en', $size->name_en,['class'=>'form-control'] )!!}
        </div>

        <div class="form-group">
            {!! Form::label('is_public', atrans('is_public') ) !!}
            {!! Form::select('is_public',['yes'=>atrans('yes'),'no'=>atrans('no')], $size->is_public,['class'=>'form-control'] )!!}
        </div>

        <input type="hidden" name="department_id" class="department_id" value="{{  $size->department_id }}">
        <div id="jstree"></div>


        {!! Form::submit(atrans('save'), ['class'=>'btn btn-primary'] ) !!}
        {!! Form::close() !!}

    </div>
    <!-- /.box-body -->
</div>





@endsection
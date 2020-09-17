@extends('admin.index')
@section('content')

@push('js')
    <script>
        $(document).ready(function()
        {
            $('#jstree').jstree({
                "core" : { 
                    'data' : {!! load_dep($departments->parent, $departments->id) !!},
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
    
        {!! Form::open(['url'=>aurl('departments/'.$departments->id),'method'=>'put' ,'files'=>true ]) !!}
        <div class="form-group">
            {!! Form::label('dep_name_ar', atrans('dep_name_ar') ) !!}
            {!! Form::text('dep_name_ar', $departments->dep_name_ar,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('dep_name_en', atrans('dep_name_en') ) !!}
            {!! Form::text('dep_name_en', $departments->dep_name_en,['class'=>'form-control'] )!!}
        </div>

        <div class="clearfix"></div>
        <div id="jstree"></div>
        <input type="hidden" name="parent" class="parent_id" value="{{ $departments->parent}}">
        <div class="clearfix"></div>

        <div class="form-group">
            {!! Form::label('description', atrans('description') ) !!}
            {!! Form::textarea('description', $departments->description,['class'=>'form-control'] )!!}
        </div>

        <div class="form-group">
            {!! Form::label('keyword', atrans('keyword') ) !!}
            {!! Form::textarea('keyword', $departments->keyword,['class'=>'form-control'] )!!}
        </div>

        <div class="form-group">
            {!! Form::label('icon', atrans('icon') ) !!}
            {!! Form::file('icon',['class'=>'form-control'] )!!}
            @if (!empty($departments->icon) && Storage::has($departments->icon))
                <img src=" {{Storage::url($departments->icon)}}" style="width: 200px; hieght:200px" alt=""/>
            @endif
        </div>

        {!! Form::submit(atrans('save'), ['class'=>'btn btn-primary'] ) !!}
        {!! Form::close() !!}

    </div>
    <!-- /.box-body -->
</div>





@endsection
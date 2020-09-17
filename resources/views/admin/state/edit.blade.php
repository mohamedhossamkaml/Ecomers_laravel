@extends('admin.index')
@section('content')


@push('js')
    <script>
        $(document).ready(function()
        {
            @if ($state->country_id) 
                $.ajax({
                            url:'{{ aurl('state/create') }}',
                            type:'get',
                            dataType:'html',
                            data:{country_id:'{{ $state->country_id }}',select:'{{ $state->city_id }}'},
                            success: function(data)
                            {
                                $('.city').html(data);
                            }

                        });
            
            @endif

            $(document).on('change','.country_id',function()
            {
                var country = $('.country_id option:selected').val();
                if (country > 0) 
                {
                    $.ajax({
                        url:'{{ aurl('state/create') }}',
                        type:'get',
                        dataType:'html',
                        data:{country_id:country,select:''},
                        success: function(data)
                        {
                            $('.city').html(data);
                        }

                    });
                }else
                {
                    $('.city').html('');
                }
            });
        });
    </script>
@endpush


<div class="box">
    <div class="box-header">
        <h3 class="box-title"> {{ $title }} </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    
        {!! Form::open(['url'=>aurl('state/'.$state->id), 'method'=>'put']) !!}

        <div class="form-group">
            {!! Form::label('state_name_ar', atrans('state_name_ar') ) !!}
            {!! Form::text('state_name_ar',$state->state_name_ar,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('state_name_en', atrans('state_name_en') ) !!}
            {!! Form::text('state_name_en', $state->state_name_en,['class'=>'form-control'] )!!}
        </div>

        <div class="form-group">
            {!! Form::label('country_id', atrans('country_id') ) !!}
            {!! Form::select('country_id',
                App\Model\Country::pluck('country_name_'.session('lang'),'id') ,
                $state->country_id,
                ['class'=>'form-control country_id','placeholder'=>'...........'] )
                !!}
        </div>

        <div class="form-group">
            {!! Form::label('city_id', atrans('city_id') ) !!}
            <span class="city"></span>
        </div>

        {!! Form::submit(atrans('save'), ['class'=>'btn btn-primary'] ) !!}
        {!! Form::close() !!}

    </div>
    <!-- /.box-body -->
</div>





@endsection
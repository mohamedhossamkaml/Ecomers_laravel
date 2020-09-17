@extends('admin.index')
@section('head')
    <li class="active btn btn-info"><a href="{{ aurl('shippings') }}" ><i class="fas fa-industry"></i> {{ atrans('shippings') }} </a></li>
@endsection
@section('content')


@push('js')

    <script type="text/javascript" src='https://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>

    <script type="text/javascript" src="{{url('design/adminlt/dist/js/locationpicker.jquery.js')}}" ></script>

    <?php 

        $lat = !empty(old('lat'))?old('lat'):30.07146780463694 ;
        $lng = !empty(old('lng'))?old('lng'):31.27560329437255 ;

    ?>
    
    
    <script>
        $('#us1').locationpicker({
            location: {
                latitude: {{ $lat }},
                longitude: {{ $lng }}
            },
            radius: 200, 
            markerIcon: "{{url('design/adminlt/dist/js/map-marker-2-xl.png')}}",
            inputBinding: {
                            latitudeInput: $('#lat'),
                            longitudeInput: $('#lng'),
                            radiusInput: $('#radius'),
                            //locationNameInput: $('#address')
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
    
        {!! Form::open(['url'=>aurl('shippings/'.$shipping->id), 'method'=>'put','files'=>true]) !!}


        <input type="hidden" value="{{ $lat }}" id="lat" name="lat">
        <input type="hidden" value="{{ $lng }}" id="lng" name="lng">


        <div class="form-group">
            {!! Form::label('name_ar', atrans('shipping_name_ar') ) !!}
            {!! Form::text('name_ar',$shipping->name_ar,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('name_en', atrans('shipping_name_en') ) !!}
            {!! Form::text('name_en', $shipping->name_en,['class'=>'form-control'] )!!}
        </div>

        <div class="form-group">
            {!! Form::label('user_id', atrans('user_id') ) !!}
            {!! Form::text('user_id',App\User::where('level','company')->pluck('name','id'), $shipping->user_id,['class'=>'form-control'] )!!}
        </div>

        <div class="form-group">
            <div id="us1" style="width: 100%; height: 400px;"></div>
        </div>
        <div class="form-group">
            {!! Form::label('radius', atrans('radius') ) !!} 
            {!! Form::text('radius', old('radius'),['class'=>'form-control radius','id'=>'radius'] )!!}
        </div>

        <div class="form-group">
            {!! Form::label('icon', atrans('shippings_icon') ) !!}
            {!! Form::file('icon',['class'=>'form-control'] )!!}
            @if (!empty($shipping->icon))
                <img src=" {{Storage::url($shipping->icon)}}" style="width: 80px; hieght:80px" alt=""/>
            @endif
        </div>


        {!! Form::submit(atrans('save'), ['class'=>'btn btn-primary'] ) !!}
        {!! Form::close() !!}

    </div>
    <!-- /.box-body -->
</div>





@endsection
@extends('admin.index')
@section('head')
    <li class="{{active_menu_s('create')[0]}} btn btn-info"><a href="{{ aurl('molls') }}" ><i class="fas fa-store"></i> {{ atrans('molls') }} </a></li>
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
                            locationNameInput: $('#address')
                        },
                        enableAutocomplete: true,


        });
    </script>
@endpush



<div class="box">
    <div class="box-header">
        <h3 class="box-title"> {{ $title }} </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    
        {!! Form::open(['url'=>aurl('molls') ,'files'=>true ]) !!}

        <input type="hidden" value="{{ $lat }}" id="lat" name="lat">
        <input type="hidden" value="{{ $lng }}" id="lng" name="lng">

        <div class="form-group">
            {!! Form::label('name_ar', atrans('moll_name_ar') ) !!}
            {!! Form::text('name_ar', old('moll_name_ar'),['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('name_en', atrans('moll_name_en') ) !!}
            {!! Form::text('name_en', old('moll_name_en'),['class'=>'form-control'] )!!}
        </div>
        <div class="form-group">
            {!! Form::label('contact_name', atrans('admin_moll') ) !!}
            {!! Form::text('contact_name', old('contact_name'),['class'=>'form-control'] )!!}
        </div>
        <div class="form-group">
            {!! Form::label('email', atrans('email') ) !!}
            {!! Form::email('email', old('email'),['class'=>'form-control'] )!!}
        </div>
        <div class="form-group">
            {!! Form::label('facbook', atrans('facbook') ) !!}
            {!! Form::text('facbook', old('facbook'),['class'=>'form-control'] )!!}
        </div>
        <div class="form-group">
            {!! Form::label('twitter', atrans('twitter') ) !!}
            {!! Form::text('twitter', old('twitter'),['class'=>'form-control'] )!!}
        </div>
        <div class="form-group">
            {!! Form::label('website', atrans('website') ) !!}
            {!! Form::text('website', old('website'),['class'=>'form-control'] )!!}
        </div>
        <div class="form-group">
            {!! Form::label('mobile', atrans('mobile') ) !!}
            {!! Form::text('mobile', old('mobile'),['class'=>'form-control'] )!!}
        </div>

        <div class="form-group">
            {!! Form::label('radius', atrans('radius') ) !!} 
            {!! Form::text('radius', old('radius'),['class'=>'form-control radius','id'=>'radius'] )!!}
        </div>

        <div class="form-group">
            {!! Form::label('country_id', atrans('country_id') ) !!} 
            {!! Form::select('country_id',App\Model\Country::pluck('country_name_'.session('lang'),'id'), old('country_id'),['class'=>'form-control address','id'=>'address'] )!!}
        </div>

        <div class="form-group">
            {!! Form::label('address', atrans('address') ) !!} 
            {!! Form::text('address', old('address'),['class'=>'form-control address','id'=>'address'] )!!}
        </div>

        <div class="form-group">
            <div id="us1" style="width: 100%; height: 400px;"></div>
        </div>


        <div class="form-group">
            {!! Form::label('icon', atrans('molls_icon') ) !!}
            {!! Form::file('icon',['class'=>'form-control'] )!!}
        </div>

        {!! Form::submit(atrans('add'), ['class'=>'btn btn-primary'] ) !!}
        {!! Form::close() !!}

    </div>
    <!-- /.box-body -->
</div>


@endsection
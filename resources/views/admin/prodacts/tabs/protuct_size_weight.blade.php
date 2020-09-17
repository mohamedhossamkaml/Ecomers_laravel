
@push('js')
    <script>
        $(document).ready(function() {

            
                var dataSelect= [

                    @foreach (App\Model\Country::all() as $country)
                        {
                            
                                "text":"{{ $country->{'country_name_'.lang()} }}", 
                                "children":[
                                    @foreach ($country->malls()->get() as $mall)
                                    {
                                        "id":{{ $mall->id }},
                                        "text":"{{ $mall->{'name_'.lang()} }}",
                                        "selected":'{{ check_mall($mall->id,$product->id)}}',
                                    },
                                    @endforeach
                                ],
                            
                        },
                    @endforeach
                ];
            

            $('.mall_select2').select2({data:dataSelect});
        });
    </script>
@endpush


<div id="protuct_size_weight" class="tab-pane fade">
    <h3>{{ atrans("protuct_size_weight") }}</h3>
    
    <hr/>

    <div class="size_weight">
        <center><h2>{{ atrans('size_weight_mess') }}</h2></center>
    </div>

    <hr/>

    <div class="info-data hidden">
        <div class="form-group col-md-4 col-lg-4 col-sm-4 col-xs-12">
            {!! Form::label('color_id', atrans('color_id') ) !!}
            {!! Form::select('color_id',App\Model\Color::pluck('name_'.lang(),'id'),$product->color_id,['class'=>'form-control ','placeholder'=>atrans("null") ]) !!}
        </div>

        <div class="form-group col-md-4 col-lg-4 col-sm-4 col-xs-12">
            {!! Form::label('trade_id', atrans('trade_id') ) !!}
            {!! Form::select('trade_id',App\Model\TradeMark::pluck('name_'.lang(),'id'),$product->trade_id,['class'=>'form-control ','placeholder'=>atrans("null") ]) !!}
        </div>


        <div class="form-group col-md-4 col-lg-4 col-sm-4 col-xs-12">
            {!! Form::label('manu_id', atrans('Manu_id') ) !!}
            {!! Form::select('manu_id',App\Model\Maunfacturers::pluck('name_'.lang(),'id'),$product->trade_id,['class'=>'form-control ','placeholder'=>atrans("null") ]) !!}
        </div>

        <div class="clearfix"></div>
        <hr/>

        <div class="col-md-12 col-lg-12 col-sm-12">
            {!! Form::label('malls', atrans('malls') ) !!}

            <select name="mall[]" placeholder="{{ atrans("malls") }} "  class="form-control mall_select2" multiple="multiple" style="width: 100%"></select>

        </div>

        <div class="clearfix"></div>
    </div>

</div>


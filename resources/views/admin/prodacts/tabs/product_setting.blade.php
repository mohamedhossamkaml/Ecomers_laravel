
@push('js')
    <script type="text/javascript">
        $('.datepicker').datepicker({ 
            rtl:'{{ session('lang')=='ar'?true:false }}',
            language:'{{ session('lang') }}',
            format:'yyyy-mm-dd',
            autoclose:false,
            todayBtn:true,
            clearBtn:true,
        });

        $(document).on('change','.status',function()
        {
            var status = $('.status option:selected').val() ;

            if(status == 'refused') 
            {
                $('.reson').removeClass('hidden');
            }
            else
            {
                $('.reson').addClass('hidden');
            }
        }); 
    </script>

@endpush

<div id="product_setting" class="tab-pane fade">
    <h3>{{ atrans('product_setting') }}</h3>
    
    <div class="form-group col-md-4 col-lg-3 col-sm-4 col-xs-12">
        {!! Form::label('price', atrans('product_price') ) !!}
        {!! Form::text('price',$product->price,['class'=>'form-control ','placeholder'=>atrans("product_price") ]) !!}
    </div>
    
    <div class="form-group col-md-4 col-lg-3 col-sm-4 col-xs-12">
        {!! Form::label('stock', atrans('product_stock') ) !!}
        {!! Form::text('stock',$product->stock,['class'=>'form-control ','placeholder'=>atrans("product_stock") ]) !!}
    </div>
    
    <div class="form-group col-md-4 col-lg-3 col-sm-4 col-xs-12">
        {!! Form::label('start_at', atrans('product_start_at') ) !!}
        {!! Form::text('start_at',$product->start_at,['class'=>'form-control datepicker','placeholder'=>atrans("product_start_at") ]) !!}
    </div>
    
    <div class="form-group col-md-4 col-lg-3 col-sm-4 col-xs-12">
        {!! Form::label('end_at', atrans('product_end_at') ) !!}
        {!! Form::text('end_at',$product->end_at,['class'=>'form-control datepicker','placeholder'=>atrans("product_end_at") ]) !!}
    </div>

    <div class="clearfix"></div>
    <hr/>
    
    <div class="form-group col-md-4 col-lg-4 col-sm-4 col-xs-12">
        {!! Form::label('price_offer', atrans('product_price_offer') ) !!}
        {!! Form::text('price_offer',$product->price_offer,['class'=>'form-control','placeholder'=>atrans("product_price_offer") ]) !!}
    </div>
    
    
    <div class="form-group col-md-4 col-lg-4 col-sm-4 col-xs-12">
        {!! Form::label('start_offer_at', atrans('product_start_offer_at') ) !!}
        {!! Form::text('start_offer_at',$product->start_offer_at,['class'=>'form-control datepicker','placeholder'=>atrans("product_start_offer_at") ]) !!}
    </div>
    
    <div class="form-group col-md-4 col-lg-4 col-sm-4 col-xs-12">
        {!! Form::label('end_offer_at', atrans('product_end_offer_at') ) !!}
        {!! Form::text('end_offer_at',$product->end_offer_at,['class'=>'form-control datepicker','placeholder'=>atrans("product_end_offer_at") ]) !!}
    </div>
    
    <div class="clearfix"></div>
    <hr/>
    
    <div class="form-group">
        {!! Form::label('status', atrans('product_status') ) !!}
        {!! Form::select('status',['pending'=>atrans('pending'),'refused'=>atrans('refused'),'active'=>atrans('active')],$product->status,['class'=>'form-control status' ]) !!}
    </div>
    
        
    <div class="form-group reson {{ $product->status != 'refused'?'hidden':'' }}">
        {!! Form::label('reson', atrans('product_reson') ) !!}
        {!! Form::textarea('reson',$product->reson,['class'=>'form-control ','placeholder'=>atrans("product_reson") ]) !!}
    </div>

</div>

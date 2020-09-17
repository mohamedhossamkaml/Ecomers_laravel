@push('app')
<script src="{{ url('')}}/js/app.js"></script>
@endpush
@push('css')
<link rel="stylesheet" href="{{ url('') }}/css/app.css"  /> 
@endpush

<div id="related_product_vue" class="tab-pane fade">
    <h3>{{ atrans('related_product') }}</h3>
    
    <div class="col-lg-12 col-md-12 col-ms-12">
        <div id="apps">
            <elements></elements>

            <ol>
                @foreach ($product->related()->get() as $related)
                    
                    <li>
                        <label>
                            <input type="checkbox" checked name="related[]" value="{{ $related->related_product }}"/> 
                            {{ $related->product()->first()->title }}
                        </label>
                    </li>
                @endforeach
            </ol>
            
        </div>
    </div>



    
    
    <div class="clearfix"></div>
    <br/>

</div>

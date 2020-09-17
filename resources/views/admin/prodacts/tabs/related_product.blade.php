@push('js')
    <script>
        $(document).ready(function(){

            $(document).on('click','.do_search',function() {
                
                var search = $('.search').val();

                if(search != '' || search != null)
                {
                    $.ajax({
                        url:'{{ aurl('products/search') }}',
                        dataType:'json',
                        type:'post',
                        data:{_token:'{{ csrf_token() }}',search:search,id:{{ $product->id }}},
                        beforeSend: function(){
                            $('.loading_data').removeClass('hidden');
                        },success: function(data){
                            if(data.status == true){
                                if (data.count > 0) {
                                    var itmes = '';
                                    $.each(data.result,function(index,value){
                                        itmes += '<li><label><input type="checkbox" name="related[]" value="'+value.id+'"/> '+value.title+'</label></li>'
                                        
                                    });
                                    $('.itmes').html(itmes);
                                }else{
                                    $('.itmes').html(itmes);
                                }
                                $('.loading_data').addClass('hidden');
                            }
                        },error: function(data){

                        }, 
                    });
                }
            });
        });
    </script>
@endpush
<div id="related_product" class="tab-pane fade">
    <h3>{{ atrans('related_product') }}</h3>
    
    <div class="col-lg-12 col-md-12 col-ms-12">

        <!-- Search form -->
        <form class="form-inline d-flex justify-content-center md-form form-sm active-pink active-pink-2 mt-2">
            <i class="fas fa-search fa-2x do_search" aria-hidden="true"></i>
            <i class="fas fa-search fa-2x fa-spin fa-spinner loading_data hidden" aria-hidden="true"></i>
            <input class="form-control col-md-6 form-control-sm ml-3 w-75 search" type="text" placeholder="Search"
            aria-label="Search">
        </form>

        <hr/>

        <div class="col-md-12 col-lg-12 col-ms-12">
            <ol class="itmes">
                {{-- @foreach ($product->related()->get() as $related)
                    
                    <li>
                        <label>
                            <input type="checkbox" checked name="related[]" value="{{ $related->related_product }}"/> 
                            {{ $related->product()->first()->title }}
                        </label>
                    </li>
                @endforeach --}}
            </ol>
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

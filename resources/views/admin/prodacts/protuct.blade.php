@extends('admin.index')
@section('head')
    <li class="{{active_menu_s('create')[0]}} btn btn-info"><a href="{{ aurl('prodacts') }}" ><i class="fas fa-tag"></i> {{ atrans('prodacts') }} </a></li>
@endsection
@section('content')


{{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />  --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script> --}}
@push('js')

    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {


            $(document).on('click','.copy_protuct',function()
            {
                $.ajax({
                    url:'{{ aurl('prodacts/copy/'.$product->id) }}',
                    dataType:'json',
                    type:'post',
                    data:{_token:'{{ csrf_token() }}'},
                    beforeSend: function(){
                        $('.loading_copy').removeClass('hidden');
                        $('.validate_mess').html('');
                        $('.error_mess').addClass('hidden');
                        $('.success_mess').html('').addClass('hidden');
                    },success: function(data){
                        if(data.status == true)
                        {
                            $('.loading_copy').addClass('hidden');
                            $('.success_mess').html('<h1>'+data.message+'</h1>').removeClass('hidden');
                            setTimeout(function() {
                                window.location.href = '{{ aurl('prodacts') }}/'+data.id+'/edit';
                            },5000);
                        }
                    },error(response){
                        $('.loading_copy').addClass('hidden');
                        var error_li= '';
                        $.each(response.responseJSON.errors,function(index,value)
                        {
                            error_li +='<li>'+value+'</li>';
                        });
                        $('.validate_mess').html(error_li);
                        $('.error_mess').removeClass('hidden');
                    }
                });
                
                return false;
            });

            $(document).on('click','.save_and_continue',function(){
                
                var form_data = $('#product_form').serialize();

                $.ajax({
                    url:'{{ aurl('prodacts/'.$product->id) }}',
                    dataType:'json',
                    type:'post',
                    data:form_data,
                    beforeSend: function(){
                        $('.loading_save_c').removeClass('hidden');

                        $('.validate_mess').html('');
                        $('.error_mess').addClass('hidden');

                        $('.success_mess').html('').addClass('hidden');
                        
                    },success: function(data){

                        $('.loading_save_c').addClass('hidden');
                        
                        if(data.status == true)
                        {
                            $('.success_mess').html('<h1>'+data.message+'</h1>').removeClass('hidden');
                        }

                    },error(response){
                        $('.loading_save_c').addClass('hidden');

                        var error_li= '';

                        $.each(response.responseJSON.errors,function(index,value)
                        {
                            error_li +='<li>'+value+'</li>';
                        });

                        $('.validate_mess').html(error_li);
                        $('.error_mess').removeClass('hidden');

                    }
                });

                
                return false;
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
    
        {!! Form::open(['url'=>aurl('prodacts'),'method'=>'put', 'files'=>true, 'id'=>'product_form'] ) !!}

        <a href="#" class="btn btn-primary save">
            {{ atrans('save') }}                           
            <i class="far fa-save"></i>
        </a>

        <a href="#" class="btn btn-success save_and_continue">
            {{ atrans('save_and_continue') }} 
            <i class="fas fa-save"></i>
            <i class="fa fa-spin fa-spinner loading_save_c hidden"></i>
        </a>

        <a href="#" class="btn btn-info copy_protuct">
            {{ atrans('copy_protuct') }}              
            <i class="fa fa-copy"></i> 
            <i class="fa fa-spin fa-spinner loading_copy hidden"></i>   
        </a>

        <a href="#" class="btn btn-danger delete" data-toggle="modal" data-target="#del_admin{{ $product->id }}" > 
            {{ atrans('delete') }}
            <i class="fa fa-trash"></i>    
        </a>

        <hr/>   

        {{-- error_message --}}
        <div class="alert alert-danger error_mess hidden">           
            <ul class="validate_mess">
            </ul>
        </div>
        
        {{-- success_message --}}
        <div class="alert alert-success success_mess hidden"></div>

        <hr/>

        <ul class="nav nav-tabs">
            <li class="active">
                <a data-toggle="tab" href="#product_info">{{ atrans('product_info') }} 
                <i class="fas fa-info-circle"></i> 
                </a>   
            </li>
            <li>
                <a data-toggle="tab" href="#department">{{ atrans('department') }}                    
                <i class="fas fa-list-alt"></i>
                </a>    
            </li>
            <li>
                <a data-toggle="tab" href="#product_setting">{{ atrans('product_setting') }}          
                <i class="fas fa-cog"></i>
                </a>   
            </li>
            <li>
                <a data-toggle="tab" href="#product_media">{{ atrans('product_media') }}              
                    <i class="fas fa-images"></i>
                </a>   
            </li>
            <li>
                <a data-toggle="tab" href="#protuct_size_weight">{{ atrans("protuct_size_weight") }}  
                    <i class="fas fa-dolly-flatbed"></i>
                </a>   
            </li>
            <li>
                <a data-toggle="tab" href="#other_data">{{ atrans("other_data") }}                    
                    <i class="fas fa-database"></i>
                </a>   
            </li>
            {{-- <li>
                <a data-toggle="tab" href="#related_product">{{ atrans("related_product") }}                    
                    <i class="fas fa-tasks"></i>
                </a>   
            </li> --}}
            <li>
                <a data-toggle="tab" href="#related_product_vue">{{ atrans("related_product_vue") }}                    
                    <i class="fas  fa-address-book"></i>
                </a>   
            </li>
        </ul>

        <div class="tab-content">


            @include('admin.prodacts.tabs.product_info')

            @include('admin.prodacts.tabs.department')

            @include('admin.prodacts.tabs.product_setting')

            @include('admin.prodacts.tabs.product_media')

            @include('admin.prodacts.tabs.protuct_size_weight')

            @include('admin.prodacts.tabs.other_data')

            {{-- @include('admin.prodacts.tabs.related_product') --}}

            @include('admin.prodacts.tabs.related_product_vue')



            
        </div>
        

        <hr/> 

        <a href="#" class="btn btn-primary save">
            {{ atrans('save') }}                           
            <i class="far fa-save"></i>   
        </a>
        <a href="#" class="btn btn-success save_and_continue">
            {{ atrans('save_and_continue') }} 
            <i class="fas fa-save"></i>
            <i class="fa fa-spin fa-spinner loading_save_c hidden"></i>
        </a>
        <a href="#" class="btn btn-info copy_protuct">
            {{ atrans('copy_protuct') }}              
            <i class="fa fa-copy"></i>
            <i class="fa fa-spin fa-spinner loading_copy hidden"></i>    
        </a>
        <a href="#" class="btn btn-danger delete" data-toggle="modal" data-target="#del_admin{{ $product->id}}" >
            {{ atrans('delete') }} 
            <i class="fa fa-trash"></i>    
        </a>


        {!! Form::close() !!}

    </div>
    <!-- /.box-body -->
</div>



<!-- Modal -->
<div id="del_admin{{ $product->id }}" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{atrans('delete')}}</h4>
            </div>
            {!! Form::open(['route'=>['prodacts.destroy',$product->id],'method'=>'delete']) !!}
            <div class="modal-body">
                <p>{{ trans('admin.delete_this',['name'=>$product->title])  }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">{{atrans('close')}}</button>
                {!! Form::submit(atrans('yes'), ['class'=>'btn btn-danger']) !!}
            </div>
            {!! Form::close() !!}
        </div>

    </div>
</div>


@endsection
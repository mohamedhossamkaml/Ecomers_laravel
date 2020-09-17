<div id="product_info" class="tab-pane fade in active">
    <h3>{{ atrans('product_info') }}</h3>
    

    <div class="form-group">
        {!! Form::label('title', atrans('product_title') ) !!}
        {!! Form::text('title',$product->title,['class'=>'form-control','placeholder'=>atrans("product_title") ]) !!}
    </div>

    <div class="form-group">
        {!! Form::label('content', atrans('product_content') ) !!}
        {!! Form::textarea('content',$product->content,['class'=>'form-control','placeholder'=>atrans("product_content")]) !!}
    </div>


</div>

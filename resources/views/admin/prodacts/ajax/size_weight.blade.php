<div class="col-md-6">
    <div class="form-group">
    
        <label for="sizes" class="col-md-3">{{ atrans('size_id') }}</label>
        <div class="col-md-9">
            {!! Form::select('size_id',$sizes,$product->size_id,['class'=>'form-control','placeholder'=>atrans('size_id')]) !!}
        </div>
    </div>
    
    <div class="form-group">
        <label for="sizes" class="col-md-3">{{ atrans('size') }}</label>
        <div class="col-md-9">
            {!! Form::text('size',$product->size,['class'=>'form-control','placeholder'=>atrans('size')]) !!}
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="weight" class="col-md-3">{{ atrans('weight_id') }}</label>
        <div class="col-md-9">
            {!! Form::select('weight_id',$weight,$product->weight_id,['class'=>'form-control','placeholder'=>atrans('weight_id')]) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="weight" class="col-md-3">{{ atrans('weight') }}</label>
        <div class="col-md-9">
            {!! Form::text('weight',$product->weight,['class'=>'form-control','placeholder'=>atrans('weight')]) !!}
        </div>
    </div>
</div>

<div class="clearfix"></div>
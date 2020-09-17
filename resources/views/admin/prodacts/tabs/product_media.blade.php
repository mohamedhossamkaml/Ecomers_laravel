@push('js')

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script> --}}
    <script src="{{url('')}}/design/adminlt/dist/js/dropzone.min.js"></script>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css"> --}}
    <link rel="stylesheet" href="{{url('')}}/design/adminlt/dist/css/dropzone.min.css">

    <script>
        Dropzone.autoDiscover =false;
        $(document).ready(function()
        {
            $('#mainphoto').dropzone({
                url:"{{ aurl('update/image/'.$product->id) }}" ,
                paramName:'file',
                autoDiscover:false,
                uploadMultiple:false,
                maxFiles:1,
                maxFilessize:3, //mb
                acceptedFiles:'image/*',
                dictDefaultMessage:'{{ atrans('upload_message') }}',
                dictRemoveFile:'{{ atrans('delete') }}',
                params:{
                    _token:'{{ csrf_token() }}'
                },
                removedfile:function(file)
                {
                    //file.fid

                    $.ajax({
                        dataType:'json',
                        type:'post',
                        url:"{{ aurl('delete/product/image/'.$product->id) }}" ,
                        data:{_token:'{{ csrf_token() }}'}
                    });

                    var fmock;

                    return (fmock = file.previewElement) != null ? fmock.parentNode.removeChild(file.previewElement) : void 0;

                },
                addRemoveLinks:true,
                init:function()
                {
                        
                    @if(!empty($product->photo))
                        var mock = {name:'{{ $product->title }}', size:'' , type:''};
                        this.emit('addedfile',mock);
                        this.options.thumbnail.call(this,mock,'{{ url("storage/".$product->photo) }}');
                        $('.dz-progress').remove();
                    @endif

                    this.on('sending',function(file,xhr,forData){
                        forData.append('fid','');
                        file.fid = '';
                    });

                    this.on('success', function(file,response){
                        file.fid = response.id;
                    });
                },
            });
            
            $('#dropzonefileupload').dropzone({
                url:"{{ aurl('upload/image/'.$product->id) }}" ,
                paramName:'files',
                autoDiscover:false,
                uploadMultiple:false,
                maxFiles:15,
                maxFilessize:3, //mb
                acceptedFiles:'image/*',
                dictDefaultMessage:'{{ atrans('upload_message') }}',
                dictRemoveFile:'{{ atrans('delete') }}',
                params:{
                    _token:'{{ csrf_token() }}'
                },
                removedfile:function(file)
                {
                    //file.fid

                    $.ajax({
                        dataType:'json',
                        type:'post',
                        url:"{{ aurl('delete/image') }}" ,
                        data:{_token:'{{ csrf_token() }}',id:file.fid}
                    });

                    var fmock;

                    return (fmock = file.previewElement) != null ? fmock.parentNode.removeChild(file.previewElement) : void 0;

                },
                addRemoveLinks:true,
                init:function()
                {
                    @foreach($product->files()->get() as $file)
                        var mock = {name:'{{ $file->name }}',fid:'{{ $file->id }}', size:'{{$file->size  }}' , type:'{{ $file->mime_type }}'};
                        this.emit('addedfile',mock);
                        this.options.thumbnail.call(this,mock,'{{ url('storage/'.$file->full_file) }}');
                        $('.dz-progress').remove();
                    @endforeach

                    this.on('sending',function(file,xhr,forData){
                        forData.append('fid','');
                        file.fid = '';
                    });

                    this.on('success', function(file,response){
                        file.fid = response.id;
                    });
                }
            });
            
        });
    </script>

    <style>
        .dz-image img
        {
            width: 100%;
            height: 100%;
        }
    </style>
@endpush

<div id="product_media" class="tab-pane fade">
    <h3>{{ atrans('product_media') }}</h3>

    <center><h2>{{ atrans('main_photo') }}</h2></center>
    <div class="dropzone" id="mainphoto"></div>

    <hr/>

    <center><h2>{{ atrans('photo') }}</h2></center>
    <div class="dropzone" id="dropzonefileupload"></div>


</div>


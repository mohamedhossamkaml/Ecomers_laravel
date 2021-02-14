@extends('admin.index')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"> {{ $title }} </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body  ">

        {!! Form::open(['id'=>'form_data','url'=>aurl('prodacts/destroy/all/soft'), 'method'=>'delete']) !!}
        {!! $dataTable->table(['class'=>'dataTable table teble-striped table-hover table-striped table-bordered'], true ) !!}
        {!! Form::close() !!}

    </div>
    <!-- /.box-body -->
</div>

<!-- Trigger the modal with a button -->
{{-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> --}}

<!-- Modal -->
<div id="mutliplrDelete" class="modal fade"  role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="background-color: #182327e8; color:beige; border-radius: 21px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{atrans('delete')}}</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-default-danger ">
                    <div class="empty-record hidden">
                        <h4>{{atrans('please_check_some_records')}} </h4>
                        <p> {{atrans('delete_all_mess_no')}} </p>
                    </div>
                    <div class="not-empty-record hidden">
                        <h4>{{atrans('ask_delete_item')}} <span class="record-count"></span>  ?</h4>
                        <p> {{atrans('delete_all_mess_yes')}} </p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="empty-record hidden">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{atrans('close')}}</button>
                </div>
                <div class="not-empty-record hidden">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{atrans('no')}}</button>
                    <input type="submit" name="del_all" value=" {{atrans('yes')}} "  class="btn btn-danger del_all" />
                </div>
            </div>
        </div>

    </div>

    <a href=""></a>
</div>

@push('js')
<script>
    delete_all();
</script>
{!! $dataTable->scripts() !!}
@endpush

@endsection

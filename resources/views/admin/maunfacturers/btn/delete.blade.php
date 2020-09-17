

<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#del_admin{{$id}}"><i class="fa fa-trash"></i></button>

<!-- Modal -->
<div id="del_admin{{$id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{atrans('delete')}}</h4>
            </div>
            {!! Form::open(['route'=>['maunfacturers.destroy',$id],'method'=>'delete']) !!}
            <div class="modal-body">
                <p>{{ trans('admin.delete_this',['name'=> session('lang') == 'ar'?$name_ar:$name_en ])  }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">{{atrans('close')}}</button>
                {!! Form::submit(atrans('yes'), ['class'=>'btn btn-danger']) !!}
            </div>
            {!! Form::close() !!}
        </div>

    </div>
</div>

@extends('admin.index')
@section('head')
    <li class="active btn btn-info btn-sm"><a href="{{ aurl('groups') }}" ><i class="fas fa-users-cog"></i> {{ atrans('admin_groups') }} </a></li>
@endsection
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"> {{ $title }} </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        {!! Form::open(['url'=>aurl('groups/'.$admingroups->id), 'method'=>'put']) !!}
        <div class="form-group">
            {!! Form::label('name', atrans('name') ) !!}
            {!! Form::text('name',$admingroups->name,['class'=>'form-control'] )!!}
        </div>
        <table class="table table-striped table-hover table-bordered ">
            <thead>
                <tr>
                    <th>Modeol</th>
                    <th>Add</th>
                    <th>Edie</th>
                    <th>Show</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ atrans('admin') }}</td>
                    <td> <input type="checkbox" name="admin_add"    {{ $admingroups->admin_add=='enable'?'checked':'' }}    value="enable" > </td>
                    <td> <input type="checkbox" name="admin_edie"   {{ $admingroups->admin_edie=='enable'?'checked':'' }}   value="enable" > </td>
                    <td> <input type="checkbox" name="admin_show"   {{ $admingroups->admin_show=='enable'?'checked':'' }}   value="enable" > </td>
                    <td> <input type="checkbox" name="admin_delete" {{ $admingroups->admin_delete=='enable'?'checked':'' }} value="enable" > </td>
                </tr>
                <tr>
                    <td>{{ atrans('admin_groups') }}</td>
                    <td> <input type="checkbox" name="admin_groups_add"   {{ $admingroups->admin_groups_add=='enable'?'checked':'' }}    value="enable"> </td>
                    <td> <input type="checkbox" name="admin_groups_edie"  {{ $admingroups->admin_groups_edie=='enable'?'checked':'' }}   value="enable"> </td>
                    <td> <input type="checkbox" name="admin_groups_show"  {{ $admingroups->admin_groups_show=='enable'?'checked':'' }}   value="enable"> </td>
                    <td> <input type="checkbox" name="admin_groups_delete"{{ $admingroups->admin_groups_delete=='enable'?'checked':'' }} value="enable"> </td>
                </tr>
                <tr>
                    <td>{{ atrans('users') }}</td>
                    <td> <input type="checkbox" name="users_add"    {{ $admingroups->users_add=='enable'?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="users_edie"   {{ $admingroups->users_edie=='enable'?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="users_show"   {{ $admingroups->users_show=='enable'?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="users_delete" {{ $admingroups->users_delete=='enable'?'checked':'' }} value="enable"> </td>
                </tr>
                <tr>
                    <td>{{ atrans('molls') }}</td>
                    <td> <input type="checkbox" name="molls_add"    {{ $admingroups->molls_add=='enable'?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="molls_edie"   {{ $admingroups->molls_edie=='enable'?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="molls_show"   {{ $admingroups->molls_show=='enable'?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="molls_delete" {{ $admingroups->molls_delete=='enable'?'checked':'' }} value="enable"> </td>
                </tr>
                <tr>
                    <td>{{ atrans('maunfacturers') }}</td>
                    <td> <input type="checkbox" name="maunfacturers_add"    {{ $admingroups->maunfacturers_add=='enable'?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="maunfacturers_edie"   {{ $admingroups->maunfacturers_edie=='enable'?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="maunfacturers_show"   {{ $admingroups->maunfacturers_show=='enable'?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="maunfacturers_delete" {{ $admingroups->maunfacturers_delete=='enable'?'checked':'' }} value="enable"> </td>
                </tr>
                <tr>
                    <td>{{ atrans('city') }}</td>
                    <td> <input type="checkbox" name="city_add"    {{ $admingroups->city_add=='enable'?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="city_edie"   {{ $admingroups->city_edie=='enable'?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="city_show"   {{ $admingroups->city_show=='enable'?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="city_delete" {{ $admingroups->city_delete=='enable'?'checked':'' }} value="enable"> </td>
                </tr>
                <tr>
                    <td>{{ atrans('country') }}</td>
                    <td> <input type="checkbox" name="country_add"    {{ $admingroups->country_add=='enable'?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="country_edie"   {{ $admingroups->country_edie=='enable'?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="country_show"   {{ $admingroups->country_show=='enable'?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="country_delete" {{ $admingroups->country_delete=='enable'?'checked':'' }} value="enable"> </td>
                </tr>
                <tr>
                    <td>{{ atrans('state') }}</td>
                    <td> <input type="checkbox" name="state_add"    {{ $admingroups->state_add=='enable'?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="state_edie"   {{ $admingroups->state_edie=='enable'?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="state_show"   {{ $admingroups->state_show=='enable'?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="state_delete" {{ $admingroups->state_delete=='enable'?'checked':'' }} value="enable"> </td>
                </tr>
                <tr>
                    <td>{{ atrans('shipping') }}</td>
                    <td> <input type="checkbox" name="shipping_add"    {{ $admingroups->shipping_add=='enable'?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="shipping_edie"   {{ $admingroups->shipping_edie=='enable'?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="shipping_show"   {{ $admingroups->shipping_show=='enable'?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="shipping_delete" {{ $admingroups->shipping_delete=='enable'?'checked':'' }} value="enable"> </td>
                </tr>
                <tr>
                    <td>{{ atrans('prodact') }}</td>
                    <td> <input type="checkbox" name="prodact_add"    {{ $admingroups->prodact_add=='enable'?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="prodact_edie"   {{ $admingroups->prodact_edie=='enable'?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="prodact_show"   {{ $admingroups->prodact_show=='enable'?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="prodact_delete" {{ $admingroups->prodact_delete=='enable'?'checked':'' }} value="enable"> </td>
                </tr>
                <tr>
                    <td>{{ atrans('size') }}</td>
                    <td> <input type="checkbox" name="size_add"    {{ $admingroups->size_add=='enable'?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="size_edie"   {{ $admingroups->size_edie=='enable'?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="size_show"   {{ $admingroups->size_show=='enable'?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="size_delete" {{ $admingroups->size_delete=='enable'?'checked':'' }} value="enable"> </td>
                </tr>
            </tbody>
        </table>
        {!! Form::submit(atrans('save'), ['class'=>'btn btn-primary'] ) !!}
        {!! Form::close() !!}

    </div>
    <!-- /.box-body -->
</div>





@endsection

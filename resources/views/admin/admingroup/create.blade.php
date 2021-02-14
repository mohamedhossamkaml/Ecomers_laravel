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

        {!! Form::open(['url'=>aurl('groups')]) !!}
        <div class="form-group">
            {!! Form::label('name', atrans('name') ) !!}
            {!! Form::text('name', old('name'),['class'=>'form-control'] )!!}
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
                    <td> <input type="checkbox" name="admin_add"    {{ old('admin_add')?'checked':'' }}    value="enable"> </td>
                    <td> <input type="checkbox" name="admin_edie"   {{ old('admin_edie')?'checked':'' }}   value="enable"> </td>
                    <td> <input type="checkbox" name="admin_show"   {{ old('admin_show')?'checked':'' }}   value="enable"> </td>
                    <td> <input type="checkbox" name="admin_delete" {{ old('admin_delete')?'checked':'' }} value="enable"> </td>
                </tr>
                <tr>
                    <td>{{ atrans('admin_groups') }}</td>
                    <td> <input type="checkbox" name="admin_groups_add"   {{ old('admin_groups_add')?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="admin_groups_edie"  {{ old('admin_groups_edie')?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="admin_groups_show"  {{ old('admin_groups_show')?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="admin_groups_delete"{{ old('admin_groups_delete')?'checked':'' }} value="enable"> </td>
                </tr>
                <tr>
                    <td>{{ atrans('users') }}</td>
                    <td> <input type="checkbox" name="users_add"    {{ old('users_add')?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="users_edie"   {{ old('users_edie')?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="users_show"   {{ old('users_show')?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="users_delete" {{ old('users_delete')?'checked':'' }} value="enable"> </td>
                </tr>
                <tr>
                    <td>{{ atrans('molls') }}</td>
                    <td> <input type="checkbox" name="molls_add"    {{ old('molls_add')?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="molls_edie"   {{ old('molls_edie')?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="molls_show"   {{ old('molls_show')?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="molls_delete" {{ old('molls_delete')?'checked':'' }} value="enable"> </td>
                </tr>
                <tr>
                    <td>{{ atrans('maunfacturers') }}</td>
                    <td> <input type="checkbox" name="maunfacturers_add"    {{ old('maunfacturers_add')?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="maunfacturers_edie"   {{ old('maunfacturers_edie')?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="maunfacturers_show"   {{ old('maunfacturers_show')?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="maunfacturers_delete" {{ old('maunfacturers_delete')?'checked':'' }} value="enable"> </td>
                </tr>
                <tr>
                    <td>{{ atrans('shipping') }}</td>
                    <td> <input type="checkbox" name="shipping_add"    {{ old('shipping_add')?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="shipping_edie"   {{ old('shipping_edie')?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="shipping_show"   {{ old('shipping_show')?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="shipping_delete" {{ old('shipping_delete')?'checked':'' }} value="enable"> </td>
                </tr>
                <tr>
                    <td>{{ atrans('city') }}</td>
                    <td> <input type="checkbox" name="city_add"    {{ old('city_add')?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="city_edie"   {{ old('city_edie')?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="city_show"   {{ old('city_show')?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="city_delete" {{ old('city_delete')?'checked':'' }} value="enable"> </td>
                </tr>
                <tr>
                    <td>{{ atrans('country') }}</td>
                    <td> <input type="checkbox" name="country_add"    {{ old('country_add')?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="country_edie"   {{ old('country_edie')?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="country_show"   {{ old('country_show')?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="country_delete" {{ old('country_delete')?'checked':'' }} value="enable"> </td>
                </tr>
                <tr>
                    <td>{{ atrans('state') }}</td>
                    <td> <input type="checkbox" name="state_add"    {{ old('state_add')?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="state_edie"   {{ old('state_edie')?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="state_show"   {{ old('state_show')?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="state_delete" {{ old('state_delete')?'checked':'' }} value="enable"> </td>
                </tr>
                <tr>
                    <td>{{ atrans('prodact') }}</td>
                    <td> <input type="checkbox" name="prodact_add"    {{ old('prodact_add')?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="prodact_edie"   {{ old('prodact_edie')?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="prodact_show"   {{ old('prodact_show')?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="prodact_delete" {{ old('prodact_delete')?'checked':'' }} value="enable"> </td>
                </tr>
                <tr>
                    <td>{{ atrans('size') }}</td>
                    <td> <input type="checkbox" name="size_add"    {{ old('size_add')?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="size_edie"   {{ old('size_edie')?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="size_show"   {{ old('size_show')?'checked':'' }} value="enable"> </td>
                    <td> <input type="checkbox" name="size_delete" {{ old('size_delete')?'checked':'' }} value="enable"> </td>
                </tr>
            </tbody>
        </table>
        {!! Form::submit(atrans('create_admingroups'), ['class'=>'btn btn-primary'] ) !!}
        {!! Form::close() !!}

    </div>
    <!-- /.box-body -->
</div>





@endsection

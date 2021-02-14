<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\DataTables\AdminGroupsDatatable;

use Illuminate\Http\Request;

use App\Model\admingroup;

class AdminGroupsController extends Controller
{
    public function __construct()
    {
        $this->middleware('Permission:admin_groups_show'  ,['only'=>'index']);
        $this->middleware('Permission:admin_groups_edie'  ,['only'=>'edit','update']);
        $this->middleware('Permission:admin_groups_add'   ,['only'=>'create','store']);
        $this->middleware('Permission:admin_groups_delete',['only'=>'destroy','multi_delete']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(AdminGroupsDatatable $admin)
    {
        return $admin->render('admin.admingroup.index', ['title' => atrans('Admin')]);
    }


    public function validate_value(){

        $rest=[
            'name'                => 'required',
            'admin_show'          => 'sometimes|nullable|in:enable,disable',
            'admin_edie'          => 'sometimes|nullable|in:enable,disable',
            'admin_add'           => 'sometimes|nullable|in:enable,disable',
            'admin_delete'        => 'sometimes|nullable|in:enable,disable',

            'admin_groups_add'    => 'sometimes|nullable|in:enable,disable',
            'admin_groups_edie'   => 'sometimes|nullable|in:enable,disable',
            'admin_groups_show'   => 'sometimes|nullable|in:enable,disable',
            'admin_groups_delete' => 'sometimes|nullable|in:enable,disable',

            'users_add'           => 'sometimes|nullable|in:enable,disable',
            'users_edie'          => 'sometimes|nullable|in:enable,disable',
            'users_show'          => 'sometimes|nullable|in:enable,disable',
            'users_delete'        => 'sometimes|nullable|in:enable,disable',

            'size_show'        => 'sometimes|nullable|in:enable,disable',
            'size_edie'       => 'sometimes|nullable|in:enable,disable',
            'size_add'       => 'sometimes|nullable|in:enable,disable',
            'size_delete'     => 'sometimes|nullable|in:enable,disable',

            'molls_show'        => 'sometimes|nullable|in:enable,disable',
            'molls_edie'       => 'sometimes|nullable|in:enable,disable',
            'molls_add'       => 'sometimes|nullable|in:enable,disable',
            'molls_delete'     => 'sometimes|nullable|in:enable,disable',

            'country_show'        => 'sometimes|nullable|in:enable,disable',
            'country_edie'       => 'sometimes|nullable|in:enable,disable',
            'country_add'       => 'sometimes|nullable|in:enable,disable',
            'country_delete'     => 'sometimes|nullable|in:enable,disable',

            'city_show'        => 'sometimes|nullable|in:enable,disable',
            'city_edie'       => 'sometimes|nullable|in:enable,disable',
            'city_add'       => 'sometimes|nullable|in:enable,disable',
            'city_delete'     => 'sometimes|nullable|in:enable,disable',

            'state_show'        => 'sometimes|nullable|in:enable,disable',
            'state_edie'       => 'sometimes|nullable|in:enable,disable',
            'state_add'       => 'sometimes|nullable|in:enable,disable',
            'state_delete'     => 'sometimes|nullable|in:enable,disable',

            'maunfacturers_show'        => 'sometimes|nullable|in:enable,disable',
            'maunfacturers_edie'       => 'sometimes|nullable|in:enable,disable',
            'maunfacturers_add'       => 'sometimes|nullable|in:enable,disable',
            'maunfacturers_delete'     => 'sometimes|nullable|in:enable,disable',

            'shipping_show'        => 'sometimes|nullable|in:enable,disable',
            'shipping_edie'       => 'sometimes|nullable|in:enable,disable',
            'shipping_add'       => 'sometimes|nullable|in:enable,disable',
            'shipping_delete'     => 'sometimes|nullable|in:enable,disable',

            'prodact_add'         => 'sometimes|nullable|in:enable,disable',
            'prodact_edie'        => 'sometimes|nullable|in:enable,disable',
            'prodact_show'        => 'sometimes|nullable|in:enable,disable',
            'prodact_delete'      => 'sometimes|nullable|in:enable,disable',
        ];
        $data = $this->validate(request(),$rest);

        $new_data = [];
        // $new_data['name'] = $data['name'];
        foreach($rest as $k => $v){
            if(empty(request($k))){
                $new_data[$k] = 'disable';
            }else{
                $new_data[$k] = request($k);
            }
        }
        return $new_data;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admingroup.create', ['title' => atrans('create_admin')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

        admingroup::create( $this->validate_value());

        session()->flash('success', atrans('record_added'));

        return redirect(aurl('admingroups'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $admingroups = admingroup::find($id);
        $title = atrans('edit');
        return view('admin.admingroup.edit', compact('admingroups', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        admingroup::where('id', $id)->update($this->validate_value());

        session()->flash('success', atrans('record_edit'));

        return redirect(aurl('admingroups'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        admingroup::find($id)->delete();

        session()->flash('success', atrans('record_deleted'));

        return redirect(aurl('admingroups'));
    }

    public function multi_delete()
    {
        if (is_array(request('item')))
        {
            // City::destroy(request('item'));
            foreach (request('item') as $id)
            {
                $admingroups = admingroup::find($id);
                $admingroups->delete();
            }
        }else {
            // City::find(request('item'))->delete();
            foreach (request('item') as $id)
            {
                $admingroups = admingroup::find(request('item'));
                $admingroups->delete();
            }
        }
        session()->flash('success',atrans('record_deleted'));
        return redirect(aurl('admingroups'));
    }

    // public function multi_delete()
    // {
    //     if (is_array(request('item'))) {
    //         admingroup::destroy(request('item'));
    //     } else {

    //         admingroup::find(request('item'))->delete();
    //     }
    //     session()->flash('success', atrans('record_deleted'));

    //     return redirect(aurl('admingroups'));
    // }
}

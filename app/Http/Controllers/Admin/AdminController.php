<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\DataTables\AdminDatatable;

use Illuminate\Http\Request;

use App\Model\admingroup;

use App\Admin;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('Permission:admin_show'  ,['only'=>'index']);
        $this->middleware('Permission:admin_edie'  ,['only'=>'edit','update']);
        $this->middleware('Permission:admin_add'   ,['only'=>'create','store']);
        $this->middleware('Permission:admin_delete',['only'=>'destroy','multi_delete']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdminDatatable $admin)
    {
        return $admin->render('admin.admins.index', ['title' => atrans('Admin')]);
    }


    // public function __construct()
    // {
    //     $this->middleware('Permission:');
    // }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Admin Create

        return view('admin.admins.create', ['title' => atrans('create_admin')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

        $data = $this->validate(
            request(),
            [
                'frist_name'      =>  'required',
                'last_name'      =>  'required',
                'email'     =>  'required|email|unique:admins',
                'password'  =>  'required|min:6',
                'group_id'      =>  'required|numeric',
            ],
            [],
            [
                'frist_name'      =>  atrans('frist_name'),
                'last_name'      =>  atrans('last_name'),
                'email'     =>  atrans('email'),
                'password'  =>  atrans('password'),
                'group_id'  =>  atrans('group_id'),
            ]
        );

        $data['password'] = bcrypt(request('password'));
        Admin::create($data);

        session()->flash('success', atrans('record_added'));

        return redirect(aurl('admin'));
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
        $admin = Admin::find($id);
        $title = atrans('edit');
        return view('admin.admins.edit', compact('admin', 'title'));
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
        //

        $data = $this->validate(
            request(),
            [
                'frist_name'    =>  'required',
                'last_name'     =>  'required',
                'email'         =>  'required|email|unique:admins,email,' . $id,
                'password'      =>  'sometimes|nullable|min:6',
                'group_id'      =>  'required|numeric',
            ],
            [],
            [
                'frist_name'      =>  atrans('frist_name'),
                'last_name'      =>  atrans('last_name'),
                'email'     =>  atrans('email'),
                'password'  =>  atrans('password'),
                'group_id'  =>  atrans('group_id'),
            ]
        );

        if (request()->has('password')) {

            $data['password'] = bcrypt(request('password'));
        }
        Admin::where('id', $id)->update($data);

        session()->flash('success', atrans('record_edit'));

        return redirect(aurl('admin'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Admin::find($id)->delete();

        session()->flash('success', atrans('record_deleted'));

        return redirect(aurl('admin'));
    }

    public function multi_delete()
    {
        if (is_array(request('item'))) {
            Admin::destroy(request('item'));
        } else {

            Admin::find(request('item'))->delete();
        }

        session()->flash('success', atrans('record_deleted'));

        return redirect(aurl('admin'));
    }
}

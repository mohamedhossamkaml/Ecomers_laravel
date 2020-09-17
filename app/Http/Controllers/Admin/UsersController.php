<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\DataTables\UsersDatatable;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDatatable $admin)
    {
        return $admin->render('admin.users.index', ['title'=>atrans('users')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Admin Create

        return view('admin.users.create',['title'=>atrans('add')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

        $data = $this->validate(request(),
            [
                'name'      =>  'required',
                'email'     =>  'required|email|unique:users',
                'password'  =>  'required|min:6',
                'level'     =>  'required|in:user,company,vendor',//user //company //vendor
            ],[],
            [
                'name'      =>  atrans('name'),
                'level'     =>  atrans('level'),
                'email'     =>  atrans('email'),
                'password'  =>  atrans('password'),
            ]);
        
        $data['password']= bcrypt(request('password'));
        User::create($data);

        session()->flash('success',atrans('record_added'));

        return redirect(aurl('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
        $users = User::find($id);
        $title = atrans('edit'); 
        return view('admin.users.edit',compact('users','title'));
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

        $data = $this->validate(request(),
        [
            'name'      =>  'required',
            'email'     =>  'required|email|unique:users,email,'.$id,
            'password'  =>  'sometimes|nullable|min:6',
            'level'     =>  'required|in:user,company,vendor',//user /company /vendor
        ],[],
        [
            'name'      =>  atrans('name'),
            'level'     =>  atrans('level'),
            'email'     =>  atrans('email'),
            'password'  =>  atrans('password'),
        ]);
    
    if ( request()->has('password') ) 
    {
        
        $data['password']= bcrypt(request('password'));
    }
    User::where('id',$id)->update($data);

    session()->flash('success',atrans('record_edit'));

    return redirect(aurl('users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        User::find($id)->delete();

        session()->flash('success',atrans('record_deleted'));

        return redirect(aurl('users'));
    }

    public function multi_delete()
    {
        if (is_array(request('item')))
        {
            User::destroy(request('item'));
        }else {
        
            User::find(request('item'))->delete();
        }

        session()->flash('success',atrans('record_deleted'));

        return redirect(aurl('users'));
    }
}

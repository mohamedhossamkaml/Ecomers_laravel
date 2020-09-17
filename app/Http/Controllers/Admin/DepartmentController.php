<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

use App\Model\Department;
use Illuminate\Support\Facades\Storage;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.descriptions.index',['title'=>atrans('descriptions')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Admin Create

        return view('admin.descriptions.create',['title'=>atrans('add')]);
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
                'dep_name_ar'       =>  'required',
                'dep_name_en'       =>  'required',
                'icon'              =>  'sometimes|nullable|'.v_image(),
                'description'       =>  'sometimes|nullable|',
                'keyword'           =>  'sometimes|nullable|',
                'parent'            =>  'sometimes|nullable|numeric',
            ],[],
            [
                'dep_name_ar'       =>  atrans('dep_name_ar'),
                'dep_name_en'       =>  atrans('dep_name_en'),
                'icon'              =>  atrans('icon'),
                'description'       =>  atrans('description'),
                'keyword'           =>  atrans('keyword'),
                'parent'            =>  atrans('parent_id'),
            ]);
        
            if (request()->hasFile('icon')) 
            {
                $data['icon'] =  up()->upload([
                    //'new_name'      =>'',
                    'file'          =>'icon',
                    'path'          =>'departments',
                    'upload_type'   =>'single',
                    'delete_file'   =>'',
                ]); 
            }

        Department::create($data);

        session()->flash('success',atrans('record_added'));

        return redirect(aurl('departments'));
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
        $departments = Department::find($id);
        $title = atrans('edit'); 
        return view('admin.descriptions.edit',compact('departments','title'));
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

        $data = $this->validate(request(),
            [
                'dep_name_ar'       =>  'required',
                'dep_name_en'       =>  'required',
                'icon'              =>  'sometimes|nullable|'.v_image(),
                'description'       =>  'sometimes|nullable|',
                'keyword'           =>  'sometimes|nullable|',
                'parent'            =>  'sometimes|nullable|numeric',
            ],[],
            [
                'dep_name_ar'       =>  atrans('dep_name_ar'),
                'dep_name_en'       =>  atrans('dep_name_en'),
                'icon'              =>  atrans('icon'),
                'description'       =>  atrans('description'),
                'keyword'           =>  atrans('keyword'),
                'parent'            =>  atrans('parent_id'),
            ]);
        
            if (request()->hasFile('icon')) 
            {
                $data['icon'] =  up()->upload([
                    //'new_name'      =>'',
                    'file'          => 'icon',
                    'path'          => 'departments',
                    'upload_type'   => 'single',
                    'delete_file'   => Department::find($id)->icon,
                ]); 
            }

        Department::where('id',$id)->update($data);

        session()->flash('success',atrans('record_edit'));

        return redirect(aurl('departments'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public static function delete_parent($id)
    {
        $department_parent = Department::where('parent',$id)->get();

        foreach ($department_parent as $sub) 
        {
            self::delete_parent($sub->id);

            if(!empty($sub->icon))
            {
                Storage::has($sub->icon) ? Storage::delete($sub->icon):'';
            }

            $subdepartment = Department::find($sub->id);
            
            if (! empty($subdepartment)) 
            {
                $subdepartment->delete();
            }
        }
        
        $dep = Department::find($id);

        if(!empty($dep->icon))
        {
            Storage::has($dep->icon) ? Storage::delete($dep->icon):'';
        }

        $dep->delete();

    }
    
    public function destroy($id)
    {
        self::delete_parent($id);

        session()->flash('success',atrans('record_deleted'));

        return redirect(aurl('departments'));
    }


}

<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\DataTables\MollsDatatable;

use Illuminate\Http\Request;

use App\Model\Moll;
use Illuminate\Support\Facades\Storage;

class MollsController extends Controller
{
    public function __construct()
    {
        $this->middleware('Permission:molls_show'  ,['only'=>'index']);
        $this->middleware('Permission:molls_edie'  ,['only'=>'edit','update']);
        $this->middleware('Permission:molls_add'   ,['only'=>'create','store']);
        $this->middleware('Permission:molls_delete',['only'=>'destroy','multi_delete']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MollsDatatable $trade)
    {
        return $trade->render('admin.molls.index', ['title'=> atrans('molls')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Admin Create

        return view('admin.molls.create',['title'=>atrans('creat_molls')]);
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
                'name_ar'       =>  'required',
                'name_en'       =>  'required',
                'country_id'    =>  'required|numeric',
                'address'       =>  'sometimes|nullable',
                'facbook'       =>  'sometimes|nullable|url',
                'twitter'       =>  'sometimes|nullable|url',
                'website'       =>  'sometimes|nullable|url',
                'contact_name'  =>  'sometimes|nullable|string',
                'mobile'        =>  'sometimes|nullable|numeric',
                'email'         =>  'sometimes|nullable|email',
                'lat'           =>  'sometimes|nullable',
                'lng'           =>  'sometimes|nullable',
                'icon'          =>  'sometimes|nullable|'.v_image(),
            ],[],
            [
                'name_ar'       =>  atrans('name_ar'),
                'name_en'       =>  atrans('name_en'),
                'country_id'    =>  atrans('country_id'),
                'address'       =>  atrans('address'),
                'facbook'       =>  atrans('facbook'),
                'twitter'       =>  atrans('twitter'),
                'website'       =>  atrans('website'),
                'contact_name'  =>  atrans('contact_name'),
                'mobile'        =>  atrans('mobile'),
                'email'         =>  atrans('email'),
                'lat'           =>  atrans('lat'),
                'lng'           =>  atrans('lng'),
                'icon'          =>  atrans('icon'),
            ]);

        if (request()->hasFile('icon'))
        {
            $data['icon'] =  up()->upload([
                //'new_name'      =>'',
                'file'          =>'icon',
                'path'          =>'molls',
                'upload_type'   =>'single',
                'delete_file'   =>'',
            ]);
        }
        Moll::create($data);

        session()->flash('success',atrans('record_added'));

        return redirect(aurl('molls'));
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
        $moll = Moll::find($id);
        $title = atrans('edit');
        return view('admin.molls.edit',compact('moll','title'));
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
                'name_ar'       =>  'required',
                'name_en'       =>  'required',
                'country_id'    =>  'required|numeric',
                'address'       =>  'sometimes|nullable',
                'facbook'       =>  'sometimes|nullable|url',
                'twitter'       =>  'sometimes|nullable|url',
                'website'       =>  'sometimes|nullable|url',
                'contact_name'  =>  'sometimes|nullable|string',
                'mobile'        =>  'sometimes|nullable|numeric',
                'email'         =>  'sometimes|nullable|email',
                'lat'           =>  'sometimes|nullable',
                'lng'           =>  'sometimes|nullable',
                'icon'          =>  'sometimes|nullable|'.v_image(),
            ],[],
            [
                'name_ar'       =>  atrans('name_ar'),
                'name_en'       =>  atrans('name_en'),
                'country_id'    =>  atrans('country_id'),
                'address'       =>  atrans('address'),
                'facbook'       =>  atrans('facbook'),
                'twitter'       =>  atrans('twitter'),
                'website'       =>  atrans('website'),
                'contact_name'  =>  atrans('contact_name'),
                'mobile'        =>  atrans('mobile'),
                'email'         =>  atrans('email'),
                'lat'           =>  atrans('lat'),
                'lng'           =>  atrans('lng'),
                'icon'          =>  atrans('icon'),
            ]);

        if (request()->hasFile('icon'))
        {
            $data['icon'] =  up()->upload([
                //'new_name'      =>'',
                'file'          =>'icon',
                'path'          =>'molls',
                'upload_type'   =>'single',
                'delete_file'   =>Moll::find($id)->icon,
            ]);
        }

        Moll::where('id',$id)->update($data);

        session()->flash('success',atrans('record_edit'));

        return redirect(aurl('molls'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $molls = Moll::find($id);

        Storage::delete($molls->icon);

        $molls->delete();

        session()->flash('success',atrans('record_deleted'));

        return redirect(aurl('molls'));
    }

    public function multi_delete()
    {
        if (is_array(request('item')))
        {
            // Moll::destroy(request('item'));
            foreach (request('item') as $id)
            {
                $molls = Moll::find($id);
                Storage::delete($molls->icon);
                $molls->delete();
            }
        }else {

            // Moll::find(request('item'))->delete();
            foreach (request('item') as $id)
            {
                $molls = Moll::find(request('item'));
                Storage::delete($molls->icon);
                $molls->delete();
            }
        }

        session()->flash('success',atrans('record_deleted'));

        return redirect(aurl('molls'));
    }
}

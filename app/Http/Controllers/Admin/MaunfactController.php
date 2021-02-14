<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\DataTables\MaunfactsDatatable;

use Illuminate\Http\Request;

use App\Model\Maunfacturers;
use Illuminate\Support\Facades\Storage;

class MaunfactController extends Controller
{
    public function __construct()
    {
        $this->middleware('Permission:maunfacturers_show'  ,['only'=>'index']);
        $this->middleware('Permission:maunfacturers_edie'  ,['only'=>'edit','update']);
        $this->middleware('Permission:maunfacturers_add'   ,['only'=>'create','store']);
        $this->middleware('Permission:maunfacturers_delete',['only'=>'destroy','multi_delete']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MaunfactsDatatable $trade)
    {
        return $trade->render('admin.maunfacturers.index', ['title'=> atrans('maunfacturers')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Admin Create

        return view('admin.maunfacturers.create',['title'=>atrans('creat_Maunfacturers')]);
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
                'path'          =>'maunfacturers',
                'upload_type'   =>'single',
                'delete_file'   =>'',
            ]);
        }
        Maunfacturers::create($data);

        session()->flash('success',atrans('record_added'));

        return redirect(aurl('maunfacturers'));
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
        $maunfact = Maunfacturers::find($id);
        $title = atrans('edit');
        return view('admin.maunfacturers.edit',compact('maunfact','title'));
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
                'path'          =>'maunfacturers',
                'upload_type'   =>'single',
                'delete_file'   =>Maunfacturers::find($id)->icon,
            ]);
        }

        Maunfacturers::where('id',$id)->update($data);

        session()->flash('success',atrans('record_edit'));

        return redirect(aurl('maunfacturers'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $maunfacturers = Maunfacturers::find($id);

        Storage::delete($maunfacturers->icon);

        $maunfacturers->delete();

        session()->flash('success',atrans('record_deleted'));

        return redirect(aurl('maunfacturers'));
    }

    public function multi_delete()
    {
        if (is_array(request('item')))
        {
            // Maunfacturers::destroy(request('item'));
            foreach (request('item') as $id)
            {
                $maunfacturers = Maunfacturers::find($id);
                Storage::delete($maunfacturers->icon);
                $maunfacturers->delete();
            }
        }else {

            // Maunfacturers::find(request('item'))->delete();
            foreach (request('item') as $id)
            {
                $maunfacturers = Maunfacturers::find(request('item'));
                Storage::delete($maunfacturers->icon);
                $maunfacturers->delete();
            }
        }

        session()->flash('success',atrans('record_deleted'));

        return redirect(aurl('maunfacturers'));
    }
}

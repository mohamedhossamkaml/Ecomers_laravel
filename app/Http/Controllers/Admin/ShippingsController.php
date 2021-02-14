<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\DataTables\ShippingsDatatable;

use Illuminate\Http\Request;

use App\Model\Shipping;
use Illuminate\Support\Facades\Storage;

class ShippingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('Permission:shipping_show'  ,['only'=>'index']);
        $this->middleware('Permission:shipping_edie'  ,['only'=>'edit','update']);
        $this->middleware('Permission:shipping_add'   ,['only'=>'create','store']);
        $this->middleware('Permission:shipping_delete',['only'=>'destroy','multi_delete']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ShippingsDatatable $trade)
    {
        return $trade->render('admin.shippings.index', ['title'=> atrans('shippings')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Admin Create

        return view('admin.shippings.create',['title'=>atrans('creat_shippings')]);
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
                'user_id'       =>  'sometimes|numeric',
                'lat'           =>  'sometimes|nullable',
                'lng'           =>  'sometimes|nullable',
                'icon'          =>  'sometimes|nullable|'.v_image(),
            ],[],
            [
                'name_ar'       =>  atrans('name_ar'),
                'name_en'       =>  atrans('name_en'),
                'user_id'       =>  atrans('user_id'),
                'lat'           =>  atrans('lat'),
                'lng'           =>  atrans('lng'),
                'icon'          =>  atrans('icon'),
            ]);

        if (request()->hasFile('icon'))
        {
            $data['icon'] =  up()->upload([
                //'new_name'      =>'',
                'file'          =>'icon',
                'path'          =>'shippings',
                'upload_type'   =>'single',
                'delete_file'   =>'',
            ]);
        }
        Shipping::create($data);

        session()->flash('success',atrans('record_added'));

        return redirect(aurl('shippings'));
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
        $shipping = Shipping::find($id);
        $title = atrans('edit');
        return view('admin.shippings.edit',compact('shipping','title'));
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
                'user_id'       =>  'sometimes|numeric',
                'lat'           =>  'sometimes|nullable',
                'lng'           =>  'sometimes|nullable',
                'icon'          =>  'sometimes|nullable|'.v_image(),
            ],[],
            [
                'name_ar'       =>  atrans('name_ar'),
                'name_en'       =>  atrans('name_en'),
                'user_id'       =>  atrans('user_id'),
                'lat'           =>  atrans('lat'),
                'lng'           =>  atrans('lng'),
                'icon'          =>  atrans('icon'),
            ]);

        if (request()->hasFile('icon'))
        {
            $data['icon'] =  up()->upload([
                //'new_name'      =>'',
                'file'          =>'icon',
                'path'          =>'shippings',
                'upload_type'   =>'single',
                'delete_file'   =>Shipping::find($id)->icon,
            ]);
        }

        Shipping::where('id',$id)->update($data);

        session()->flash('success',atrans('record_edit'));

        return redirect(aurl('shippings'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $shippings = Shipping::find($id);

        Storage::delete($shippings->icon);

        $shippings->delete();

        session()->flash('success',atrans('record_deleted'));

        return redirect(aurl('shippings'));
    }

    public function multi_delete()
    {
        if (is_array(request('item')))
        {
            // Shipping::destroy(request('item'));
            foreach (request('item') as $id)
            {
                $shippings = Shipping::find($id);
                Storage::delete($shippings->icon);
                $shippings->delete();
            }
        }else {

            // Shipping::find(request('item'))->delete();
            foreach (request('item') as $id)
            {
                $shippings = Shipping::find(request('item'));
                Storage::delete($shippings->icon);
                $shippings->delete();
            }
        }

        session()->flash('success',atrans('record_deleted'));

        return redirect(aurl('shippings'));
    }
}

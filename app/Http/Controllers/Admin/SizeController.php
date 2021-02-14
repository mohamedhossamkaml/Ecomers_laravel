<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\DataTables\SizeDatatable;

use Illuminate\Http\Request;

use App\Model\Size;
use Illuminate\Support\Facades\Storage;

class SizeController extends Controller
{
    public function __construct()
    {
        $this->middleware('Permission:size_show'  ,['only'=>'index']);
        $this->middleware('Permission:size_edie'  ,['only'=>'edit','update']);
        $this->middleware('Permission:size_add'   ,['only'=>'create','store']);
        $this->middleware('Permission:size_delete',['only'=>'destroy','multi_delete']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SizeDatatable $trade)
    {
        return $trade->render('admin.size.index', ['title'=> atrans('size')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Admin Create

        return view('admin.size.create',['title'=>atrans('creat_size')]);
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
                'department_id' =>  'required|numeric',
                'is_public'     =>  'required|in:yes,no',

            ],[],
            [
                'name_ar'       =>  atrans('name_ar'),
                'name_en'       =>  atrans('name_en'),
                'department_id' =>  atrans('department_id'),
                'is_public'     =>  atrans('is_public'),
            ]);


        Size::create($data);

        session()->flash('success',atrans('record_added'));

        return redirect(aurl('size'));
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
        $size = Size::find($id);
        $title = atrans('edit');
        return view('admin.size.edit',compact('size','title'));
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
                'department_id' =>  'required|numeric',
                'is_public'     =>  'required|in:yes,no',

            ],[],
            [
                'name_ar'       =>  atrans('name_ar'),
                'name_en'       =>  atrans('name_en'),
                'department_id' =>  atrans('department_id'),
                'is_public'     =>  atrans('is_public'),
            ]);


        Size::where('id',$id)->update($data);

        session()->flash('success',atrans('record_edit'));

        return redirect(aurl('size'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $size = Size::find($id);

        $size->delete();

        session()->flash('success',atrans('record_deleted'));

        return redirect(aurl('size'));
    }

    public function multi_delete()
    {
        if (is_array(request('item')))
        {
            // Size::destroy(request('item'));
            foreach (request('item') as $id)
            {
                $size = Size::find($id);
                $size->delete();
            }
        }else {

            // Size::find(request('item'))->delete();
            foreach (request('item') as $id)
            {
                $size = Size::find(request('item'));
                $size->delete();
            }
        }

        session()->flash('success',atrans('record_deleted'));

        return redirect(aurl('size'));
    }
}

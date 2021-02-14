<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\DataTables\TradeMarkDatatable;

use Illuminate\Http\Request;

use App\Model\TradeMark;
use Illuminate\Support\Facades\Storage;

class TradeMarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TradeMarkDatatable $trade)
    {
        return $trade->render('admin.trademarks.index', ['title'=> atrans('trademarks')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Admin Create

        return view('admin.trademarks.create',['title'=>atrans('creat_tradmarks')]);
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
                'logo'          =>  'required|'.v_image(),
            ],[],
            [
                'name_ar'       =>  atrans('name_ar'),
                'name_en'       =>  atrans('name_en'),
                'logo'          =>  atrans('logo'),
            ]);

        if (request()->hasFile('logo'))
        {
            $data['logo'] =  up()->upload([
                //'new_name'      =>'',
                'file'          =>'logo',
                'path'          =>'trademarks',
                'upload_type'   =>'single',
                'delete_file'   =>'',
            ]);
        }
        TradeMark::create($data);

        session()->flash('success',atrans('record_added'));

        return redirect(aurl('trademarks'));
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
        $trademark = TradeMark::find($id);
        $title = atrans('edit');
        return view('admin.trademarks.edit',compact('trademark','title'));
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
                'logo'          =>  'sometimes|nullable|'.v_image(),
            ],[],
            [
                'name_ar'       =>  atrans('name_ar'),
                'name_en'       =>  atrans('name_en'),
                'logo'          =>  atrans('logo'),
            ]);

        if (request()->hasFile('logo'))
        {
            $data['logo'] =  up()->upload([
                //'new_name'      =>'',
                'file'          =>'logo',
                'path'          =>'trademarks',
                'upload_type'   =>'single',
                'delete_file'   =>TradeMark::find($id)->logo,
            ]);
        }

        TradeMark::where('id',$id)->update($data);

        session()->flash('success',atrans('record_edit'));

        return redirect(aurl('trademarks'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $trademarks = TradeMark::find($id);

        Storage::delete($trademarks->logo);

        $trademarks->delete();

        session()->flash('success',atrans('record_deleted'));

        return redirect(aurl('trademarks'));
    }

    public function multi_delete()
    {
        if (is_array(request('item')))
        {
            // TradeMark::destroy(request('item'));
            foreach (request('item') as $id)
            {
                $trademarks = TradeMark::find($id);
                Storage::delete($trademarks->logo);
                $trademarks->delete();
            }
        }else {

            // TradeMark::find(request('item'))->delete();
            foreach (request('item') as $id)
            {
                $trademarks = TradeMark::find(request('item'));
                Storage::delete($trademarks->logo);
                $trademarks->delete();
            }
        }

        session()->flash('success',atrans('record_deleted'));

        return redirect(aurl('trademarks'));
    }
}

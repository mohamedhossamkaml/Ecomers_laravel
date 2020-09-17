<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\DataTables\WeightsDatatable;

use Illuminate\Http\Request;

use App\Model\Weight; 
use Illuminate\Support\Facades\Storage;

class WeightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(WeightsDatatable $trade)
    {
        return $trade->render('admin.weights.index', ['title'=> atrans('weights')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Admin Create

        return view('admin.weights.create',['title'=>atrans('creat_color')]);
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
            ],[],
            [
                'name_ar'       =>  atrans('name_ar'),
                'name_en'       =>  atrans('name_en'),
            ]);
        

        Weight::create($data);

        session()->flash('success',atrans('record_added'));

        return redirect(aurl('weight'));
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
        $weight = Weight::find($id);
        $title = atrans('edit'); 
        return view('admin.weights.edit',compact('weight','title'));
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
            ],[],
            [
                'name_ar'       =>  atrans('name_ar'),
                'name_en'       =>  atrans('name_en'),
            ]);
        
        Weight::where('id',$id)->update($data);

        session()->flash('success',atrans('record_edit'));

        return redirect(aurl('weight'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $weights = Weight::find($id);

        $weights->delete();

        session()->flash('success',atrans('record_deleted'));

        return redirect(aurl('weight'));
    }

    public function multi_delete()
    {
        if (is_array(request('item')))
        {
            // Weight::destroy(request('item'));
            foreach (request('item') as $id) 
            {
                $weights = Weight::find($id);
                $weights->delete();
            }
        }else {
        
            // Weight::find(request('item'))->delete();
            foreach (request('item') as $id) 
            {
                $weights = Weight::find(request('item'));
                $weights->delete();
            }
        }

        session()->flash('success',atrans('record_deleted'));

        return redirect(aurl('weight'));
    }
}

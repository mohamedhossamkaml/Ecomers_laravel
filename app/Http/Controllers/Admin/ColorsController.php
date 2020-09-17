<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\DataTables\ColorsDatatable;

use Illuminate\Http\Request;

use App\Model\Color; 
use Illuminate\Support\Facades\Storage;

class ColorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ColorsDatatable $trade)
    {
        return $trade->render('admin.colors.index', ['title'=> atrans('colors')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Admin Create

        return view('admin.colors.create',['title'=>atrans('creat_color')]);
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
                'color'         =>  'required|string',

            ],[],
            [
                'name_ar'       =>  atrans('name_ar'),
                'name_en'       =>  atrans('name_en'),
                'color'         =>  atrans('color'),
            ]);
        

        Color::create($data);

        session()->flash('success',atrans('record_added'));

        return redirect(aurl('colors'));
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
        $color = Color::find($id);
        $title = atrans('edit'); 
        return view('admin.colors.edit',compact('color','title'));
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
                'color'         =>  'required|string',

            ],[],
            [
                'name_ar'       =>  atrans('name_ar'),
                'name_en'       =>  atrans('name_en'),
                'color'         =>  atrans('color'),
            ]);
        
        Color::where('id',$id)->update($data);

        session()->flash('success',atrans('record_edit'));

        return redirect(aurl('colors'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $colors = Color::find($id);

        $colors->delete();

        session()->flash('success',atrans('record_deleted'));

        return redirect(aurl('colors'));
    }

    public function multi_delete()
    {
        if (is_array(request('item')))
        {
            // Color::destroy(request('item'));
            foreach (request('item') as $id) 
            {
                $colors = Color::find($id);
                $colors->delete();
            }
        }else {
        
            // Color::find(request('item'))->delete();
            foreach (request('item') as $id) 
            {
                $colors = Color::find(request('item'));
                $colors->delete();
            }
        }

        session()->flash('success',atrans('record_deleted'));

        return redirect(aurl('colors'));
    }
}

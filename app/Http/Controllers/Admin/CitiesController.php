<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\DataTables\CitiesDatatable;

use Illuminate\Http\Request;

use App\Model\City;
use Illuminate\Support\Facades\Storage;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CitiesDatatable $city)
    {
        return $city->render('admin.cities.index', ['title'=> atrans('creat_city')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Admin Create

        return view('admin.cities.create',['title'=>atrans('creat_city')]);
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
                'city_name_ar'       =>  'required',
                'city_name_en'       =>  'required',
                'country_id'         =>  'required|numeric',
            ],[],
            [
                'city_name_ar'       =>  atrans('city_name_ar'),
                'city_name_en'       =>  atrans('city_name_en'),
                'country_id'         =>  atrans('country_id'),
            ]);
        

        City::create($data);

        session()->flash('success',atrans('record_added'));

        return redirect(aurl('cities'));
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
        $city = City::find($id);
        $title = atrans('edit'); 
        return view('admin.cities.edit',compact('city','title'));
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
                'city_name_ar'       =>  'required',
                'city_name_en'       =>  'required',
                'country_id'         =>  'required|numeric',
            ],[],
            [
                'city_name_ar'       =>  atrans('city_name_ar'),
                'city_name_en'       =>  atrans('city_name_en'),
                'country_id'         =>  atrans('country_id'),
            ]);
        
        City::where('id',$id)->update($data);

        session()->flash('success',atrans('record_edit'));

        return redirect(aurl('cities'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $cities = City::find($id);

        $cities->delete();

        session()->flash('success',atrans('record_deleted'));

        return redirect(aurl('cities'));
    }

    public function multi_delete()
    {
        if (is_array(request('item')))
        {
            // City::destroy(request('item'));
            foreach (request('item') as $id) 
            {
                $cities = City::find($id);
                $cities->delete();
            }
        }else {
        
            // City::find(request('item'))->delete();
            foreach (request('item') as $id) 
            {
                $cities = City::find(request('item'));
                $cities->delete();
            }
        }

        session()->flash('success',atrans('record_deleted'));

        return redirect(aurl('cities'));
    }
}

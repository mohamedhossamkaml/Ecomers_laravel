<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\DataTables\CountriesDatatable;

use Illuminate\Http\Request;

use App\Model\Country;
use Illuminate\Support\Facades\Storage;

class CountriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('Permission:country_show'  ,['only'=>'index']);
        $this->middleware('Permission:country_edie'  ,['only'=>'edit','update']);
        $this->middleware('Permission:country_add'   ,['only'=>'create','store']);
        $this->middleware('Permission:country_delete',['only'=>'destroy','multi_delete']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CountriesDatatable $country)
    {
        return $country->render('admin.countries.index', ['title'=> atrans('creat_countries')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Admin Create

        return view('admin.countries.create',['title'=>atrans('creat_countries')]);
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
                'country_name_ar'       =>  'required',
                'country_name_en'       =>  'required',
                'mob'                   =>  'required',
                'code'                  =>  'required',
                'currency'              =>  'required',
                'logo'                  =>  'sometimes|nullable|'.v_image(),
            ],[],
            [
                'country_name_ar'       =>  atrans('country_name_ar'),
                'country_name_en'       =>  atrans('country_name_en'),
                'mob'                   =>  atrans('mob'),
                'code'                  =>  atrans('code'),
                'currency'              =>  atrans('currency'),
                'logo'                  =>  atrans('logo'),
            ]);

        if (request()->hasFile('logo'))
        {
            $data['logo'] =  up()->upload([
                //'new_name'      =>'',
                'file'          =>'logo',
                'path'          =>'countries',
                'upload_type'   =>'single',
                'delete_file'   =>'',
            ]);
        }
        Country::create($data);

        session()->flash('success',atrans('record_added'));

        return redirect(aurl('countries'));
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
        $country = Country::find($id);
        $title = atrans('edit');
        return view('admin.countries.edit',compact('country','title'));
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
                'country_name_ar'       =>  'required',
                'country_name_en'       =>  'required',
                'mob'                   =>  'required',
                'code'                  =>  'required',
                'currency'              =>  'required',
                'logo'                  =>  'sometimes|nullable|'.v_image(),
            ],[],
            [
                'country_name_ar'       =>  atrans('country_name_ar'),
                'country_name_en'       =>  atrans('country_name_en'),
                'mob'                   =>  atrans('mob'),
                'code'                  =>  atrans('code'),
                'currency'              =>  atrans('currency'),
                'logo'                  =>  atrans('logo'),
            ]);

        if (request()->hasFile('logo'))
        {
            $data['logo'] =  up()->upload([
                //'new_name'      =>'',
                'file'          =>'logo',
                'path'          =>'countries',
                'upload_type'   =>'single',
                'delete_file'   =>Country::find($id)->logo,
            ]);
        }

        Country::where('id',$id)->update($data);

        session()->flash('success',atrans('record_edit'));

        return redirect(aurl('countries'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $countries = Country::find($id);

        Storage::delete($countries->logo);

        $countries->delete();

        session()->flash('success',atrans('record_deleted'));

        return redirect(aurl('countries'));
    }

    public function multi_delete()
    {
        if (is_array(request('item')))
        {
            // Country::destroy(request('item'));
            foreach (request('item') as $id)
            {
                $countries = Country::find($id);
                Storage::delete($countries->logo);
                $countries->delete();
            }
        }else {

            // Country::find(request('item'))->delete();
            foreach (request('item') as $id)
            {
                $countries = Country::find(request('item'));
                Storage::delete($countries->logo);
                $countries->delete();
            }
        }

        session()->flash('success',atrans('record_deleted'));

        return redirect(aurl('countries'));
    }
}

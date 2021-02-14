<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\DataTables\StatesDatatable;

use Illuminate\Http\Request;

use App\Model\State;
use App\Model\City;
use Illuminate\Support\Facades\Storage;
use Form;

class StatesController extends Controller
{
    public function __construct()
    {
        $this->middleware('Permission:state_show'  ,['only'=>'index']);
        $this->middleware('Permission:state_edie'  ,['only'=>'edit','update']);
        $this->middleware('Permission:state_add'   ,['only'=>'create','store']);
        $this->middleware('Permission:state_delete',['only'=>'destroy','multi_delete']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StatesDatatable $state)
    {
        return $state->render('admin.state.index', ['title'=> atrans('creat_state')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Admin Create
        if (request()->ajax())
        {
            if (request()->has('country_id'))
            {
                $select = request()->has('select')?request('select'):'';
                return Form::select('city_id',
                City::where('country_id',request('country_id'))->pluck('city_name_'.session('lang'),'id') ,$select,
                ['class'=>'form-control','placeholder'=>'...........'] );
            }
        }
        return view('admin.state.create',['title'=>atrans('creat_state')]);
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
                'state_name_ar'       =>  'required',
                'state_name_en'       =>  'required',
                'city_id'             =>  'required|numeric',
                'country_id'          =>  'required|numeric',
            ],[],
            [
                'state_name_ar'       =>  atrans('city_name_ar'),
                'state_name_en'       =>  atrans('city_name_en'),
                'city_id'            =>  atrans('city_id'),
                'country_id'         =>  atrans('country_id'),
            ]);


        State::create($data);

        session()->flash('success',atrans('record_added'));

        return redirect(aurl('state'));
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
        $state = State::find($id);
        $title = atrans('edit');
        return view('admin.state.edit',compact('state','title'));
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
            'state_name_ar'       =>  'required',
            'state_name_en'       =>  'required',
            'city_id'             =>  'required|numeric',
            'country_id'          =>  'required|numeric',
        ],[],
        [
            'state_name_ar'       =>  atrans('city_name_ar'),
            'state_name_en'       =>  atrans('city_name_en'),
            'city_id'            =>  atrans('city_id'),
            'country_id'         =>  atrans('country_id'),
        ]);

        State::where('id',$id)->update($data);

        session()->flash('success',atrans('record_edit'));

        return redirect(aurl('state'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $state = State::find($id);

        $state->delete();

        session()->flash('success',atrans('record_deleted'));

        return redirect(aurl('state'));
    }

    public function multi_delete()
    {
        if (is_array(request('item')))
        {
            // State::destroy(request('item'));
            foreach (request('item') as $id)
            {
                $state = State::find($id);
                $state->delete();
            }
        }else {

            // State::find(request('item'))->delete();
            foreach (request('item') as $id)
            {
                $state = State::find(request('item'));
                $state->delete();
            }
        }

        session()->flash('success',atrans('record_deleted'));

        return redirect(aurl('state'));
    }
}

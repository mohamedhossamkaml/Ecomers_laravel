<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Setting;
use Illuminate\Http\Request;

class Settings extends Controller
{
    public function setting()
    {
        return view('admin.settings', ['title'=>atrans('settings')]);
    }


    public function setting_save()
    {
        $data = $this->validate(request(),[
            'logo' =>  v_image(),
            'icon' =>  v_image(),
            'sitename_ar' =>'',
            'sitename_en' =>'',
            'email' =>'',
            'description' =>'',
            'keywordes' =>'',
            'status' =>'',
            'message_maintenance' =>'',
            'main_lang' =>'',
    
        ],[],
        [
            'logo' => atrans('logo'),
            'icon' => atrans('icon')
        ]);


        if (request()->hasFile('logo')) 
        {
            $data['logo'] =  up()->upload([
                //'new_name'      =>'',
                'file'          =>'logo',
                'path'          =>'settings',
                'upload_type'   =>'single',
                'delete_file'   =>setting()->logo,
            ]); 
        }
        
        if (request()->hasFile('icon')) 
        {
            $data['icon'] =  up()->upload([
                //'new_name'      =>'',
                'file'          =>'icon',
                'path'          =>'settings',
                'upload_type'   =>'single',
                'delete_file'   =>setting()->icon,
            ]);
        }
        Setting::orderBy('id','desc')->update($data); 
        session()->flash('success', atrans('record_edit'));

        return redirect(aurl('settings'));

    }
}

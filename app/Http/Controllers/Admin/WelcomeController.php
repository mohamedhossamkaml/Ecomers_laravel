<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;


    use App\Admin; 
    use App\User;
    use App\Model\Maunfacturers; 
    use App\Model\Department;
    use App\Model\Moll; 
    use App\Model\Product; 

class WelcomeController extends Controller
{

    public function index()
    {
        $users_count = User::count(); 
        $maunfacturers_count = Maunfacturers::count(); 
        $department_count = Department::count(); 
        $moll_count = Moll::count(); 
        $Product_count = Product::count(); 

        return view('admin.home' , compact('users_count','maunfacturers_count','department_count' ,'moll_count','Product_count'));

    }

    public function name()
    {



        return view('admin.home' , compact('users_count','maunfacturers_count' ,'moll_count'));

    }

}

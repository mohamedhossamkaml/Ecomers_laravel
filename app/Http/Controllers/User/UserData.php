<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Model\Department;
use Illuminate\Http\Request;

class UserData extends Controller
{
    public function getCat()
    {
        $cate = Department::paginate(20) ;

        return response()->json($cate);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BackendController extends Controller
{
    
    public function UserView(){
        $users= User::all();
        return view('backend.user.view_user',compact('users'));
    }




}

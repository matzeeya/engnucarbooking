<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index() //แสดงผลการจอง
  {
    $datas = DB::table('users')->get();

    return view('components.users')->with('data',$datas);
  }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  DB;

class LogController extends Controller
{
    public  function logs(){
        $table = DB::table('logs')->where('status',0)->orderBy('id','desc')->get();
        return view('whate')->with(['tables' => $table]);
    }
    public  function logupdate(){
        $gettable=DB::table('logs')->where('status', 0)->limit(1)->get();
        $table=DB::table('logs')->where('status', 0)->limit(1)->update(['status'=>1]);
        return view('number')->with(['number' => $gettable]);
    }
}

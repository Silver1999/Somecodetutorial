<?php

namespace App\Http\Controllers;

use App\Log;
use Illuminate\Http\Request;
use  DB;

class LogController extends Controller
{
    public  function logs(){
        $table = Log::where('status',0)->orderBy('created_at','desc')->get();
        return view('whate')->with(['tables' => $table]);
    }
    public  function logupdate(){
        $gettable=Log::where('status', 0)->first();
        $table=Log::where('status', 0)->first()->update(['status'=>1]);
        return redirect("/logs/number/$gettable->id");

    }
    public  function  show($id){
        $numid=$id;
        $query=Log::where('id', $numid)->pluck('id');
        return view('number')->with(['numbers'=> $query[0]]);
    }
}

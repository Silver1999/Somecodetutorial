<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class TableController extends Controller
{
    public function index()
    {
        $table = DB::table('task')->get();
        return view('table')->with(['tables' => $table]);
    }

    public function increse(Request $request)
    {
        $id = $request->id;
        if($id==0){
            $table = DB::table('task')->get();
            return view('table')->with(['tables' => $table]);
        }

        $update = DB::table('task')
            ->where('id', $id)
            ->update(
                [
                    'counter' => DB::raw('counter + 1'),
                ]
            );
        $updatelog=DB::table('logs')->insert(['task_id'=> $id,'status'=>0]);

        $table = DB::table('task')->get();
        return view('table')->with(['tables' => $table]);
    }

}

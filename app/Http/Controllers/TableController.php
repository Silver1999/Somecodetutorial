<?php

namespace App\Http\Controllers;

use App\Log;
use App\Task;
use Illuminate\Http\Request;
use DB;


class TableController extends Controller
{
    public function index()
    {
        $table = Task::all();
        return view('table')->with(['tables' => $table]);
    }

    public function increse(Request $request)
    {
        $id = $request->id;
        if ($id == 0) {
            $table = Task::all();
            return view('table')->with(['tables' => $table]);
        }

        $update = Task::where('id', $id)
            ->update(
                [
                    'counter' => DB::raw('counter + 1'),
                ]
            );
        $updatelog = Log::insert(['tasks_id' => $id, 'status' => 0]);

        $table = Task::get();
        return back();
//        return view('table')->with(['tables' => $table]);
    }

}

<?php

namespace App\Http\Controllers;

use App\Place;
use Illuminate\Http\Request;
use Validator;

class AnotherphotoController extends Controller
{
    public function show()
    {
        $datas = Place::all('name');
        return view('pages.addphoto', compact('datas'));
    }

    public function add(Request $request)
    {
        $folder_id = $request->input('lol');
        $query = Place::where('name', $folder_id)->value('id');

        $validation =Validator::make($request->all(), [
            'photo' => 'image|mimes:jpeg,jpg,png|required',
        ]);
        if ($validation->passes()) {
            $file = $request->file('photo');
            $file->store("public/$query");
            return response()->json([
                'message' => 'Success',
            ]);


        }
        return response()->json([
            'file'  =>$validation->errors()->first('photo'),
        ]);


    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaceRequest;
use App\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Place::all();
        return view('pages.places', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = Place::all();

        return view('pages.places', compact('datas'));
    }

    public function createpost(PlaceRequest $request)
    {
        $query = Place::create(
            [
                'name' => $request->name,
                'type' => $request->tips,
            ]
        );
        return redirect('/places');
    }

    public function show(Request $request)
    {
        $id = $request->id;
        $query = Place::find($id);
        $userImagesPath = storage_path("app/public/$id");
        if (!File::exists($userImagesPath)) {
            $images = 0;
            return view('pages.place', compact('query', 'images', 'id'));
        }
        $userImagesArray = File::allFiles($userImagesPath);
        $images = [];
        foreach ($userImagesArray as $file) {
            $images[] = $file->getFilename();
        }
        return view('pages.place', compact('query', 'images', 'id'));
    }

    public function addphoto(Request $request)
    {
        $folder_id = $request->route('id');
        $data = $request->validate(
            [
                'photo' => 'image|mimes:jpeg,jpg,png|required',
            ]
        );
        $file = $request->file('photo');
        $file->store("public/$folder_id");
        return back();
    }


}

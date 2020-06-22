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
        $getdata = Place::where('id', $id)->pluck('created_at')->first();
        $getdata1 = strtotime($getdata);
        if (empty($query)) {
            abort(404);
        }
        $userImagesPath = storage_path("app/public/$id");
        if (!File::exists($userImagesPath)) {
            $images = 0;
            return view('pages.place', compact('query', 'images', 'id'));
        }
        $userImagesArray = collect(File::allFiles($userImagesPath))->sortByDesc(
            function ($userImagesArray) {
                return $userImagesArray->getCTime();
            }
        );
        $images = [];
        $file_id = 0;
        foreach ($userImagesArray as $file) {
            $images[] = $file->getFilename();
            $timefile = Storage::lastModified("public/$id/$images[$file_id]");
            $timefile1 = gmdate('M d Y H:i:s', $timefile);
//            dump($timefile1);
//            dump($getdata);
//            if ($timefile>$getdata1){
//                dump('File bigger then timecheck');
//
//
//            }
            if ($getdata1 > $timefile) {
//                dump('File  less then timecehk');
                unlink(storage_path("app/public/$id/$images[$file_id]"));
            }
            $file_id++;
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

    public function delete($id, $name)
    {
        Storage::delete("public/$id/$name");
        return back();
    }


}

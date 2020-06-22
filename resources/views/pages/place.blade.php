@extends('layout.layout')
@section('content')
    {{$query->id}}
    {{$query->name}}
    {{$query->type}}
    <br>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('addphoto', $query->id)}}" method="post" enctype=multipart/form-data>
        @csrf
        <input type="file" name="photo">
        <input type="submit" value="Добавити">
    </form>
    Фото: <br>
    @if(!$images)
        <img src="/">
    @else

        @foreach($images as $image)
            <form method="post" action="{{route('delete.place',[$id,$image])}}">
                @csrf
                <div class="item">

                    <img src="{{asset("storage/$id/$image")}}">
                    <input type="submit" class="btn btn-danger" value="Delete">


                </div>

                @endforeach
            </form>

            @endif
@endsection

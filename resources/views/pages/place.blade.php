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

        <div class="item">

            <img src="{{asset("storage/$id/$image")}}">


        </div>

    @endforeach

@endif
@endsection

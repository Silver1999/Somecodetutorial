<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<style>
    img{

        height: 50%;
        width: auto;
    }

</style>
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

@extends('layout.layout')
@section('content')
<div class="alert alert-danger" id="message" style="display: none"></div>
<div class="alert alert-success" id="message_success" style="display: none">Success</div>
<form method="post" id="upload_form" enctype="multipart/form-data">
    @csrf
    <div class="drop">

        <select class="form-control" id="exampleFormControlSelect1" name="lol">
            @foreach($datas as $data)


                <option value="{{$data->name}}">{{$data->name}}</option>

            @endforeach
        </select>
    </div>

    <div id="sendbutton">
        <input type="submit" class="btn btn-secondary" value="Send">
    </div>


    <div class="photo-picker">
        <div class="camera">
            <div class="lens"></div>
            <div class="grip"></div>
            <div class="moc"></div>
            <input class="imageUp" type="file" name="photo"/>
        </div>
        <div class="preview-card"><img class="preview" src=""/><span class="photo-title"></span></div>

    </div>
</form>
@endsection


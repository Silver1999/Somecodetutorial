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
<script>
    $(document).ready(function () {

        $('#upload_form').on('submit', function (event) {
            event.preventDefault();
            $.ajax({
                url: "{{ route('another.photo.create') }}",
                method: "POST",
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    if (data.message == "Success") {
                        document.getElementById("upload_form").reset();
                        data.message = "";
                        data.file = "";
                        $('#message_success').css('display', 'block');
                        var myobj = document.getElementById("message");
                        myobj.remove();
                        setTimeout(function(){// wait for 5 secs(2)
                            location.reload(); // then reload the page.(3)
                        }, 1000);

                    }

                    function validate(id, eroor) {

                        $(id).html(eroor);
                        $(id).css('display', 'block');
                        $(id).addClass(data.class_name);
                    }

                    validate('#message', data.file);
                },
            })
        });

    });
</script>
@endsection


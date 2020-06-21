<link rel="stylesheet" href="{{asset('css/style.css')}}">
<link rel="stylesheet" href="{{asset('css/option.css')}}">
<link rel="stylesheet" href="{{asset('css/button.css')}}">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{asset('js/script.js')}}"></script>
<script src="{{asset('js/select.js')}}"></script>
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

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
@foreach($datas as $data)
    Name:  <a href="/places/{{$data->id}}">{{$data->name}}</a> <br>
    Type:  {{$data->type}}<br>
@endforeach

@if(Request::url() === 'http://tutorial5/places/create')
    <style>
        #link{
            display: none;
        }
    </style>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{route('postcreate')}}">
        @csrf
        <input type="text" name="name">
        <select  name="tips">
            <option value="villige">Villige</option>
            <option value="city">City</option>
        </select>
        <input type="submit">
    </form>
@endif
<a href="{{route('addplace')}}" id="link">Добавити місто</a>
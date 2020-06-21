@extends('layout.layout')
@section('content')
@foreach($datas as $data)
    Name:  <a href="{{route('placeshow', $data->id)}}">{{$data->name}}</a> <br>
    Type:  {{$data->type}}<br>
@endforeach

@if(Request::is('places/create'))
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
@endsection

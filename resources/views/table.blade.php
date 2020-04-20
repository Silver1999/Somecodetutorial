@extends('app')

@section('content')

    @foreach($tables as $table)
        <tr>
            <th>{{$table->id}}</th>
            <th><a href="/id{{$table->id}}"> {{$table->name}}</a></th>
            <th>{{$table->counter}}</th>
        </tr>
    @endforeach

@endsection
@section('link')
    <button class="btn btn-success" type="button" id="lol"><a style="text-decoration: none;color: white" href="{{ route('accept') }}">Accept job</a></button>
    @endsection

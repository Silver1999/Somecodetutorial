
@extends('app')

@section('content')

    @foreach($tables as $table)
        <tr>
            <th>{{$table->id}}</th>
            <th>{{$table->task_id}} </th>
            <th>{{$table->status}}</th>
        </tr>
    @endforeach

@endsection

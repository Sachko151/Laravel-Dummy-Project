@extends('layouts.app')

@section('content')
<a href="{{ url('/search')}}">Търсете по подробно</a>
<table border="1">
	<tr>
	<td>Инфо</td>
	<td>Начална точка:</td>
	<td>Дестинация:</td>
	<td>Цена:</td>
	<td>Времетраене:</td>
	<td>Брой Спирки:</td>
	<td>Име на градовете:</td>
	</tr>
@foreach( $flights as $flight)
<tr>
	<td><a href="{{ route('flights.show', $flight->id)}}">Инфо</a></td>
	<td>{{$flight->start}}</td>
	<td>{{$flight->end}}</td>
	<td>{{$flight->price}}</td>
	<td>{{$flight->hours}}</td>
	<td>{{$flight->cities_num}}</td>
	<td>{{$flight->cities}}</td>
	@if(Auth::check() && Auth::user()->role == "Admin")
	<td><a href="{{ route('flights.edit', $flight->id)}}">Update</a></td>
	<td>
		{!! Form::open(['route' => ['flights.destroy', $flight->id], 'method' => 'delete'])!!}

		{!!Form::submit('Delete')!!}

	{!!Form::close() !!}
	</td>
</tr>

@endif
@endforeach

</table>
@if(Auth::check() && Auth::user()->role == "Admin")
<a href="{{ route('flights.create')}}">Create</a>
@endif




@endsection

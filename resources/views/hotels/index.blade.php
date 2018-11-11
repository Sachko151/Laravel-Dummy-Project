@extends('layouts.app')

@section('content')
<h1>Hotels</h1>
<table border="1">
	<tr>
	<td>Име</td>
	<td>Информация</td>
	<td>Телефонен номер</td>
	</tr>
@foreach( $hotels as $hotel)
<tr>
	<td><a href="{{ route('hotel.show', '$hotel->id')}}">{{$hotel->name}}</a></td>
	<td>{{$hotel->info}}</td>
	<td>{{$hotel->phone_number}}</td>
	@if(Auth::check() && Auth::user()->role == "Admin")
	<td><a href="{{ route('hotel.edit', $hotel->id)}}">Update</a></td>
	<td>
		{!! Form::open(['route' => ['hotel.destroy', $hotel->id], 'method' => 'delete'])!!}

		{!!Form::submit('Delete')!!}
@endif
	{!!Form::close() !!}
	</td>
</tr>

@endforeach
</table>
@if(Auth::check() && Auth::user()->role == "Admin")
<a href="{{ route('hotel.create')}}">Create</a>
@endif

@endsection

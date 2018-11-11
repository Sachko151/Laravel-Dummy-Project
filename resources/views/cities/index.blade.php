@extends('layouts.app')
@section('content')
<h1>List of cities!</h1>

<table border="1">
	<tr>
	<td>Име</td>
	</tr>
@foreach( $cities as $city)
<tr>
	<td><a href="{{ route('cities.show', $city->id)}}">{{$city->name}}</a></td>
	@if(Auth::check() && Auth::user()->role == "Admin")
	<td><a href="{{ route('cities.edit', $city->id)}}">Update</a></td>
	<td>
		{!! Form::open(['route' => ['cities.destroy', $city->id], 'method' => 'delete'])!!}

		{!!Form::submit('Delete')!!}
@endif
	{!!Form::close() !!}
	</td>
</tr>

@endforeach
</table>
@if(Auth::check() && Auth::user()->role == "Admin")
<a href="{{ route('cities.create')}}">Create</a>
@endif
@endsection
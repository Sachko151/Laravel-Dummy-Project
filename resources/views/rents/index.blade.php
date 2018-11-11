@extends('layouts.app')

@section('content')
<h1>Rent a cars</h1>
<table border="1">
	<tr>
	<td>Име</td>
	<td>Информация</td>
	<td>Налични коли</td>
	</tr>
@foreach( $rents as $rent)
<tr>
	<td><a href="{{ route('rent.show', '$rent->id')}}">{{$rent->name}}</a></td>
	<td>{{$rent->info}}</td>
	<td>{{$rent->available_cars}}</td>
	@if(Auth::check() && Auth::user()->role == "Admin")
	<td><a href="{{ route('rent.edit', $rent->id)}}">Update</a></td>
	<td>
		{!! Form::open(['route' => ['rent.destroy', $rent->id], 'method' => 'delete'])!!}

		{!!Form::submit('Delete')!!}
@endif
	{!!Form::close() !!}
	</td>
</tr>

@endforeach
</table>
@if(Auth::check() && Auth::user()->role == "Admin")
<a href="{{ route('rent.create')}}">Create</a>
@endif

@endsection

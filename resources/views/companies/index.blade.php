@extends('layouts.app')
@section('content')
<h1>List of companies!</h1>

<table border="1">
	<tr>
	<td>Име</td>
	<td>Година</td>
	</tr>
@foreach( $companies as $compani)
<tr>
	<td><a href="{{ route('companies.show', $compani->id)}}">{{$compani->name}}</a></td>
	<td>{{$compani->flights}}</td>
	@if(Auth::check() && Auth::user()->role == "Admin")
	<td><a href="{{ route('companies.edit', $compani->id)}}">Update</a></td>
	<td>
		{!! Form::open(['route' => ['companies.destroy', $compani->id], 'method' => 'delete'])!!}

		{!!Form::submit('Delete')!!}
		@endif

	{!!Form::close() !!}
	</td>
</tr>

@endforeach
</table>
@if(Auth::check() && Auth::user()->role == "Admin")
<a href="{{ route('companies.create')}}">Create</a>
@endif

@endsection
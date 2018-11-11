<!DOCTYPE html>
<html>
<head>
<title>Search</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"
	href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>

<body>
	@extends('layouts.app')

@section('content')
	<div class="container">
		<form action="{{ url('/search')}}" method="GET" role="search">
			{{ csrf_field() }}
			<div class="input-group">
				<input type="text" class="form-control" name="q"
					placeholder="Search flights" style="width: 200px;"> <span class="input-group-btn" style="width: 200px;">
						<!--SECOND-->
					<input type="text" class="form-control" name="e"
					placeholder="Search flights" style="width: 200px;">
					<button type="submit" class="btn btn-default">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</span>
			</div>
		</form>

		
		<div class="container">
			@if(isset($details))
			<p> The Search results for your query <b> {{ $query }} </b> are :</p>
			<h2>Sample flight details</h2>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Начална точка:</th>
						<th>Дестинация:</th>
						<th>Цена</th>
					</tr>
				</thead>
				<tbody>
					@foreach($details as $flight)
					<tr>
						<td>{{$flight->start}}</td>
						<td>{{$flight->end}}</td>
						<td>{{$flight->price." лв."}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@elseif(isset($message))
			<p>{{ $message }}</p>
			@endif
		</div>
@endsection
</body>
</html>
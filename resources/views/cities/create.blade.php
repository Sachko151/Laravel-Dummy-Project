<h1>Add City</h1>

{!! Form::open(['route' => 'cities.store', 'files' => 'true']) !!}
<p>

	{!! Form::text('name', 'Името тук')!!}
</p>
</p>
	{!! Form::submit('Save')!!}

{!! Form::close() !!}
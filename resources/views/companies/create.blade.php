<h1>Add Comapnie</h1>

{!! Form::open(['route' => 'companies.store', 'files' => 'true']) !!}
<p>
	
	{!! Form::text('name', 'Името тук')!!}
</p>

<p>
	
	{!! Form::text('flights', 'Полета тук!')!!}
</p>
</p>
	{!! Form::submit('Save')!!}

{!! Form::close() !!}
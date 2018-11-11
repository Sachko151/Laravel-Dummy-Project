<h1>Create your Phone</h1>


{!! Form::open(['route' => 'flights.store', 'files' => 'true']) !!}
<p>
	{!!Form::text('start', 'Start')!!}
</p>
<p>
	{!!Form::text('end', 'End')!!}
</p>
<p>Price
	{!!Form::number('price', 'Price')!!}
</p>
<p>Hours
	{!!Form::number('hours', 'Hours')!!}
</p>
<p>Прекачвания:
	{!!Form::number('cities_num', 'Cities_num')!!}
</p>
<p>Градове
	{!!Form::text('cities', 'cities')!!}
</p>
<select name="company_id">
		@foreach( $companies as $companie )
		<option value="{{ $companie->id }}">{{ $companie->name }}</option>
		@endforeach
	</select>
{!!Form::submit('Save')!!}
{!! Form::close() !!}
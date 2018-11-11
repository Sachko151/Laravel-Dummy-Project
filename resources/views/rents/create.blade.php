<h1>Add a new rent a car service</h1>


{!! Form::open(['route' => 'rent.store', 'files' => 'true']) !!}
<p>
	{!!Form::text('name', 'Name here....')!!}
</p>
<p>
	{!!Form::text('info', 'info')!!}
</p>
<p>Available Cars:
	{!!Form::number('available_cars',  '0')!!}
</p>
<select name="city_id">
		@foreach( $cities as $city )
		<option value="{{ $city->id }}">{{ $city->name }}</option>
		@endforeach
	</select>
{!!Form::submit('Save')!!}
{!! Form::close() !!}
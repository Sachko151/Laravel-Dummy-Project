<h1>Add a new hotel</h1>


{!! Form::open(['route' => 'hotel.store', 'files' => 'true']) !!}
<p>
	{!!Form::text('name', 'Name here....')!!}
</p>
<p>
	{!!Form::text('info', 'info')!!}
</p>
<p>Number
	{!!Form::number('phone_number',  '0')!!}
</p>
<select name="city_id">
		@foreach( $cities as $city )
		<option value="{{ $city->id }}">{{ $city->name }}</option>
		@endforeach
	</select>
{!!Form::submit('Save')!!}
{!! Form::close() !!}
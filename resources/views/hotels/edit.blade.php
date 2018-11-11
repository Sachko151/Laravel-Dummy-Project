<h1>Edit</h1>
@if(Session::has('message'))
 {{ Session::get('message') }}
@endif


@if( $errors->any() )
 @foreach( $errors->all() as $error)
 {{ $error }}
 @endforeach
@endif
<form action="{{ route('hotel.update', $hotel->id)}}" method="POST">
	{{ method_field('PUT') }}
	{{ csrf_field() }}
	Name
	<input type="text" name="name" value="{{ $hotel->name }}">
	<textarea name="info" value="">{{ $hotel->info }}</textarea>
	<input type="number" name="phone_number" value="{{ $hotel->phone_number }}">

	<select name="city_id">
		@foreach( $cities as $city )
		<option value="{{ $city->id }}">{{ $city->name }}</option>
		@endforeach
	</select>
	<input type="submit" name="submit" value="save">
</form>

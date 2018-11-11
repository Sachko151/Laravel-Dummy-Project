<h1>Edit</h1>
@if(Session::has('message'))
 {{ Session::get('message') }}
@endif


@if( $errors->any() )
 @foreach( $errors->all() as $error)
 {{ $error }}
 @endforeach
@endif
<form action="{{ route('flights.update', $flight->id)}}" method="POST">
	{{ method_field('PUT') }}
	{{ csrf_field() }}
	Start
	<input type="text" name="start" value="{{ $flight->start }}">
	End
	<input type="text" name="end" value="{{ $flight->end }}">
	Price
	<input type="number" name="price" value="{{ $flight->price }}">
	Length
	<input type="number" name="hours" value="{{ $flight->hours }}">
	Redirections:
	<input type="number" name="cities_num" value="{{ $flight->cities_num }}">
	Cities:
	<input type="text" name="cities" value="{{ $flight->cities }}">

	<select name="company_id">
		@foreach( $companies as $companie )
		<option value="{{ $companie->id }}">{{ $companie->name }}</option>
		@endforeach
	</select>
	<input type="submit" name="submit" value="save">
</form>



<h1>Edit</h1>
@if(Session::has('message'))
 {{ Session::get('message') }}
@endif


@if( $errors->any() )
 @foreach( $errors->all() as $error)
 {{ $error }}
 @endforeach
@endif
<form action="{{ route('companies.update', $companie->id)}}" method="POST">
	{{ method_field('PUT') }}
	{{ csrf_field() }}
	Name
	<input type="text" name="name" value="{{ $companie->name }}">
	Flights:
	<input type="text" name="flights" value="{{ $companie->flights }}">
	<input type="submit" name="submit" value="save">
</form>




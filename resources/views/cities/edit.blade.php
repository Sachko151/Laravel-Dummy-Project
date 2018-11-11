<h1>Edit</h1>
@if(Session::has('message'))
 {{ Session::get('message') }}
@endif


@if( $errors->any() )
 @foreach( $errors->all() as $error)
 {{ $error }}
 @endforeach
@endif
<form action="{{ route('cities.update', $cities->id)}}" method="POST">
	{{ method_field('PUT') }}
	{{ csrf_field() }}
	Име
	<input type="text" name="name" value="{{ $cities->name }}">
	<input type="submit" name="submit" value="save">
</form>

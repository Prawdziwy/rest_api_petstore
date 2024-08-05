<!DOCTYPE html>
<html>

<head>
	<title>Pets</title>
	<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
	<div class="container">
		<h1>Pets</h1>
		<a href="{{ route('pets.create') }}" class="button">Add New Pet</a>
		<ul>
			@foreach($pets as $pet)
				<li><a href="{{ route('pets.show', $pet['id']) }}">{{ $pet['name'] ?? 'Empty' }}</a></li>
			@endforeach
		</ul>
	</div>
</body>

</html>

<!DOCTYPE html>
<html>

<head>
	<title>Pet Details</title>
	<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
	<div class="container">
		<h1>{{ $pet['name'] }}</h1>
		<p>Status: {{ $pet['status'] }}</p>
		<a href="{{ route('pets.edit', $pet['id']) }}" class="button">Edit</a>
		<br/><br/>
		<form action="{{ route('pets.destroy', $pet['id']) }}" method="POST">
			@csrf
			@method('DELETE')
			<button type="submit" class="button">Delete</button>
		</form>
	</div>
</body>

</html>

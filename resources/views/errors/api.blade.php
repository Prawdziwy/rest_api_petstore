<!DOCTYPE html>
<html>

<head>
	<title>Error</title>
	<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
	<div class="container">
		<h1>Error</h1>
		<p>{{ $message }}</p>
		<a href="{{ route('pets.index') }}" class="button">Back to Pets</a>
	</div>
</body>

</html>

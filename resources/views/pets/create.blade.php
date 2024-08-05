<!DOCTYPE html>
<html>

<head>
	<title>Add Pet</title>
	<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
	<div class="container">
		<h1>Add Pet</h1>
		<form action="{{ route('pets.store') }}" method="POST">
			@csrf

			<label for="name">Name:</label>
			<input type="text" id="name" name="name" required>

			<label for="status">Status:</label>
			<select id="status" name="status" required>
				<option value="available">Available</option>
				<option value="pending">Pending</option>
				<option value="sold">Sold</option>
			</select>

			<button type="submit">Add</button>
		</form>
	</div>
</body>

</html>

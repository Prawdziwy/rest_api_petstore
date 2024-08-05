<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Pet</title>
	<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
	<div class="container">
		<header>
			<h1>Edit Pet</h1>
		</header>
		<main>
			<form action="{{ route('pets.update', $pet['id']) }}" method="POST">
				@csrf
				@method('PUT')

				<div class="form-group">
					<label for="name">Name:</label>
					<input type="text" id="name" name="name" value="{{ old('name', $pet['name'] ?? '') }}" required>
				</div>

				<div class="form-group">
					<label for="status">Status:</label>
					<select id="status" name="status" required>
						<option value="" disabled>Select status</option>
						<option value="available" {{ old('status', $pet['status']) === 'available' ? 'selected' : '' }}>Available
						</option>
						<option value="pending" {{ old('status', $pet['status']) === 'pending' ? 'selected' : '' }}>Pending</option>
						<option value="sold" {{ old('status', $pet['status']) === 'sold' ? 'selected' : '' }}>Sold</option>
					</select>
				</div>

				<button type="submit" class="btn btn-primary">Update</button>
			</form>
		</main>
	</div>
</body>

</html>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Petstore</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }
        .container {
            max-width: 600px;
            margin: auto;
        }
        h1 {
            color: #333;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            margin: 10px;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Petstore</h1>
        <a href="{{ route('pets.index') }}" class="button">View Pets</a>
        <!-- Maybe a future implementations -->
    </div>
</body>
</html>

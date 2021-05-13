<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Письмо</title>
</head>
<body>
	<h2>Привет, {{ $body['name'] }}</h2>
	<p>{!! $body['messages'] !!}</p>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Confirmación de Email</title>
</head>
<body>
	<div>
		<p>Hola {{ $body->name }}, <br> Bienvenido a nuestro equipo confirma tu cuenta en el siguiente link</p>
		<a href="{{ route('confirmation',['token' => $token,'email' => $body->email]) }}">Confirmar Email</a>
	</div>
</body>
</html>
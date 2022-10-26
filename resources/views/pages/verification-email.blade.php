@extends('layouts.app')
@section('content')
<div class="login-container">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-5">
				<div class="text-center">
					<img src="{{ asset('media/send.png') }}" class="img-fluid w-25 mb-5" alt="">
					<h5 class="text-center">Hemos enviado un correo electronico para confirmar tu email registrado</h5>
					<a href="{{ route('login') }}" class="btn btn-primary mt-3">Ir al inicio</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
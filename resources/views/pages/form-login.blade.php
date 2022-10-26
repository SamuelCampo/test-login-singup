@extends('layouts.app')
@section('content')
<div class="login-container">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-5">
				<form action="/login" name="form-login" method="post">
					@if(Session::has('status'))
						<div class="alert alert-danger">
							{{ Session::get('status') }}
						</div>
					@endif
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					<div class="card login-form">
						<div class="card-body">
							<div class="text-center">
								<img src="https://woobsing.com/wp-content/uploads/2019/07/logo-header-woobsing.png" class="img-fluid" alt="">
							</div>
							<div class="form-group">
								<label for="email">Username</label>
								<input type="text" class="form-control" name="email" id="email">
							</div>
							<div class="form-group">
								<label for="password">password</label>
								<input type="password" class="form-control" name="password" id="password">
							</div>
							@csrf
							<div class="d-grid gap-2 mt-3">
								<button type="submit" class="btn btn-primary btn-expand">Iniciar Sesión</button>
							</div>
							<div class="text-center mt-3">
								<a href="{{ route('singup') }}" class="text-decoration-none">
									¿Todavía no tienes cuenta? 
									<span class="text-white"><strong>Registrate</strong></span>
								</a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
@extends('layouts.app')
@section('content')
<div class="login-container">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-5">
				<form action="{{ route('confirm.code') }}" name="form-login" method="post">
					<div class="card login-form">
						<div class="card-body">
							<div class="text-center">
								<img src="https://woobsing.com/wp-content/uploads/2019/07/logo-header-woobsing.png" class="img-fluid" alt="">
							</div>
							<div class="form-group">
								<label for="password">Codigo de confirmacion</label>
								<input type="text" class="form-control" name="code" id="code">
							</div>
							@csrf
							<div class="d-grid gap-2 mt-3">
								<button type="submit" class="btn btn-primary btn-expand">Confirmar</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
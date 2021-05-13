@extends('user.layouts.layout')

@section('content')
<form action="{{ route('register.store') }}" method="post">
	@csrf
	<div class="input-group mb-3">
		<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Имя" value="{{ old('name') }}">
		<div class="input-group-append">
			<div class="input-group-text">
				<span class="fas fa-user"></span>
			</div>
		</div>
	</div>
	<div class="input-group mb-3">
		<input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}">
		<div class="input-group-append">
			<div class="input-group-text">
				<span class="fas fa-envelope"></span>
			</div>
		</div>
	</div>
	<div class="input-group mb-3">
		<input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Пароль">
		<div class="input-group-append">
			<div class="input-group-text">
				<span class="fas fa-lock"></span>
			</div>
		</div>
	</div>
	<div class="input-group mb-3">
		<input type="password" class="form-control" name="password_confirmation" placeholder="Подтверждение пароля">
		<div class="input-group-append">
			<div class="input-group-text">
				<span class="fas fa-lock"></span>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-5">
			<button type="submit" class="btn btn-primary btn-block">Регистрация</button>
		</div>
	</div>
</form><br>

<a href="{{ route('home') }}" class="text-center">Вернуться на главную</a>
@endsection
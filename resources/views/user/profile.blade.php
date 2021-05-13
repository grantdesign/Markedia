@extends('layouts.category_layout')

@section('page-title')
<div class="page-title db">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h2>{{ Auth::user()->name }} <small class="hidden-xs-down hidden-sm-down">Nulla felis eros, varius sit amet volutpat non.</small></h2>
            </div><!-- end col -->
            <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
                </ol>
            </div><!-- end col -->                    
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end page-title -->
@endsection

@section('content')
<div class="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
        	<h4>Профиль пользователя</h4>

        	@if(session()->has('status'))
	        	<div class="alert alert-success">
	        		{{ session('status') }}
	        	</div>
        	@endif

        	@if ($errors->any())
	        	<div class="alert alert-danger">
	        		<ul>
	        			@foreach ($errors->all() as $error)
	        			<li>{{ $error }}</li>
	        			@endforeach
	        		</ul>
	        	</div>
        	@endif

            <form class="form-wrapper" method="post" action="{{ route('profile.update') }}">
            	@csrf
            	<label for="">Имя</label>
                <input type="text" class="form-control" name="name" placeholder="Имя" value="{{ Auth::user()->name }}">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email" value="{{ Auth::user()->email }}">
                <label for="">Новый пароль</label>
                <input type="password" class="form-control" name="password" placeholder="Новый пароль">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>
</div><!-- end page-wrapper -->
@endsection
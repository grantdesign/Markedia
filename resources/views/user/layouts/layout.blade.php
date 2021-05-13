<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>{{ $title }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('assets/admin/css/admin.css') }}">
</head>
<body class="hold-transition register-page">
	<div class="register-box">
		<div class="register-logo">
			<b>{{ $title }}</b>
		</div>

		<div class="card">

			@if ($errors->any())
				<div class="alert alert-danger">
				    <ul>
				        @foreach ($errors->all() as $error)
				            <li>{{ $error }}</li>
				        @endforeach
				    </ul>
				</div>
			@endif

			<div class="card-body register-card-body">

			@yield('content')
			
			</div>
			<!-- /.form-box -->
		</div><!-- /.card -->
	</div>
	<!-- /.register-box -->

<script src="{{ asset('assets/admin/js/admin.js') }}"></script>
</body>
</html>
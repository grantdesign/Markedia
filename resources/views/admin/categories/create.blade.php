@extends('admin.layouts.layout')

@section('content')
	<section class="content">

		<!-- Default box -->
		<div class="card">
			<div class="card-body">
				<form role="form" method="post" action="{{ route('categories.store') }}">
					@csrf
					<div class="card-body">
						<div class="form-group">
							<label for="title">Название</label>
							<input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Название" value="{{ old('title') }}">
						</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary mt-2">Добавить</button>
					</div>
				</form>
			</div>
		</div>
		<!-- /.card -->

	</section>
@endsection
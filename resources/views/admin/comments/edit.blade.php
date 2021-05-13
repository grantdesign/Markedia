@extends('admin.layouts.layout')

@section('content')
	<section class="content">

		<!-- Default box -->
		<div class="card">
			<div class="card-body">
				<form role="form" method="post" action="{{ route('comments.update', $comment->id) }}">
					@csrf
					@method('PUT')
					<div class="card-body">
						<div class="form-group">
							<label for="name">Имя</label>
							<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Имя" value="{{ $comment->name }}">
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ $comment->email }}">
						</div>
						<div class="form-group">
							<label for="site">Сайт</label>
							<input type="text" class="form-control @error('site') is-invalid @enderror" id="site" name="site" placeholder="Сайт" value="{{ $comment->site }}">
						</div>
						<div class="form-group">
							<label for="name">Комментарий</label>
							<textarea class="form-control" name="text" id="text" cols="30" rows="10">{{ $comment->text }}</textarea>
						</div>
						<div class="form-group">
							<label for="is_check">Статус</label>
							<select class="form-control" name="is_check" id="is_check">
								@foreach($checks as $check)
									@if($check['value'] == $comment->is_check)
										<option selected="" value="{{ $check['value'] }}">{{ $check['title'] }}</option>
									@else
										<option value="{{ $check['value'] }}">{{ $check['title'] }}</option>
									@endif
								@endforeach
							</select>
						</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary mt-2">Изменить</button>
					</div>
				</form>
			</div>
		</div>
		<!-- /.card -->

	</section>
@endsection
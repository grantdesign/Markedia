@extends('admin.layouts.layout')

@section('content')
<section class="content">

	<!-- Default box -->
	<div class="card">
		<div class="card-body">
			<form role="form" method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
				@csrf
				<div class="card-body">
					<div class="form-group">
						<label for="title">Название</label>
						<input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Название" value="{{ old('title') }}">
					</div>
					<div class="form-group">
						<label for="description">Описание</label>
						<input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Описание" value="{{ old('description') }}">
					</div>
					<div class="form-group">
						<label for="content">Контент</label>
						<textarea class="form-control @error('description') is-invalid @enderror" name="content" id="content" cols="30" rows="8" placeholder="Контент">{{ old('content') }}</textarea>
					</div>
					<div class="form-group">
						<label for="category_id">Категория</label>
						<select class="form-control" name="category_id" id="category_id">
							@foreach($categories as $key => $value)
								<option value="{{ $key }}">{{ $value }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="tags">Теги</label>
						<select class="select2" name="tags[]" multiple="multiple" id="tags" data-placeholder="Выбор тегов" style="width: 100%;">
							@foreach($tags as $key => $value)
								<option value="{{ $key }}">{{ $value }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="thumbnail">Изображение</label>
						<input type="file" class="form-control-file" id="thumbnail" name="thumbnail">
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
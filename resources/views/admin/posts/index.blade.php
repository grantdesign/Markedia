@extends('admin.layouts.layout')

@section('content')
	<section class="content">

		<!-- Default box -->
		<div class="card">
			<div class="card-body">
				<a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Добавить статью</a>
				@if(!$posts->isEmpty())
					<table class="table table-bordered">
						<thead>                  
							<tr>
								<th style="width: 10px">#</th>
								<th>Наименование</th>
								<th>Категория</th>
								<th>Теги</th>
								<th>Дата</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach($posts as $post)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{$post->title }}</td>
									<td>{{ $post->category->title }}</td>
									<td>{{ $post->tags->pluck('title')->join(', ') }}</td>
									<td>{{ $post->created_at->format('d-m-Y') }}</td>
									<td>
										<a class="btn btn-info btn-sm float-left mr-1" href="{{ route('posts.edit', $post->id) }}">
											<i class="fas fa-pencil-alt"></i>
										</a>

										<form action="{{ route('posts.destroy', $post->id) }}" method="post">
											@csrf
											@method('DELETE')
											<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Подтвердите удаление')">
												<i class="fas fa-trash-alt"></i>
											</button>
										</form>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table><br>
					{{ $posts->links() }}
				@else
					<p>Статей пока нет...</p>
				@endif
			</div>
		</div>
		<!-- /.card -->

	</section>
@endsection
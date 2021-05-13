@extends('admin.layouts.layout')

@section('content')
	<section class="content">

		<!-- Default box -->
		<div class="card">
			<div class="card-body">
				<a href="{{ route('tags.create') }}" class="btn btn-primary mb-3">Добавить тег</a>
				@if(!$tags->isEmpty())
					<table class="table table-bordered">
						<thead>                  
							<tr>
								<th style="width: 10px">#</th>
								<th>Наименование</th>
								<th>Slug</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach($tags as $tag)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{$tag->title }}</td>
									<td>{{$tag->slug }}</td>
									<td>
										<a class="btn btn-info btn-sm float-left mr-1" href="{{ route('tags.edit', $tag->id) }}">
											<i class="fas fa-pencil-alt"></i>
										</a>

										<form action="{{ route('tags.destroy', $tag->id) }}" method="post">
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
					{{ $tags->links() }}
				@else
					<p>Тегов пока нет...</p>
				@endif
			</div>
		</div>
		<!-- /.card -->

	</section>
@endsection
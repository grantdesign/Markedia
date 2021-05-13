@extends('admin.layouts.layout')

@section('content')
	<section class="content">

		<!-- Default box -->
		<div class="card">
			<div class="card-body">
				<a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Добавить категорию</a>
				@if(!$categories->isEmpty())
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
							@foreach($categories as $category)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{$category->title }}</td>
									<td>{{$category->slug }}</td>
									<td>
										<a class="btn btn-info btn-sm float-left mr-1" href="{{ route('categories.edit', $category->id) }}">
											<i class="fas fa-pencil-alt"></i>
										</a>

										<form action="{{ route('categories.destroy', $category->id) }}" method="post">
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
					{{ $categories->links() }}
				@else
					<p>Категорий пока нет...</p>
				@endif
			</div>
		</div>
		<!-- /.card -->

	</section>
@endsection
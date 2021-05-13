@extends('admin.layouts.layout')

@section('content')
	<section class="content">

		<!-- Default box -->
		<div class="card">
			<div class="card-body">
				@if(!$comments->isEmpty())
					<table class="table table-bordered">
						<thead>                  
							<tr>
								<th style="width: 10px">#</th>
								<th>Имя</th>
								<th>Email</th>
								<th>Комментарий</th>
								<th>Статус</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach($comments as $comment)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{$comment->name }}</td>
									<td>{{$comment->email }}</td>
									<td>{{$comment->text }}</td>
									<td>{{ ($comment->is_check == 0) ? 'Не одобрен' : 'Одобрен' }}</td>
									<td>
										<a class="btn btn-info btn-sm float-left mr-1 mb-2" href="{{ route('comments.edit', $comment->id) }}">
											<i class="fas fa-pencil-alt"></i>
										</a>
										<form action="{{ route('comments.destroy', $comment->id) }}" method="post">
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
					{{ $comments->links() }}
				@else
					<p>Комментариев пока нет...</p>
				@endif
			</div>
		</div>
		<!-- /.card -->

	</section>
@endsection
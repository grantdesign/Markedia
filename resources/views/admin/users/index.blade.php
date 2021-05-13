@extends('admin.layouts.layout')

@section('content')
	<section class="content">

		<!-- Default box -->
		<div class="card">
			<div class="card-body">
				@if(!$users->isEmpty())
					<table class="table table-bordered">
						<thead>                  
							<tr>
								<th style="width: 10px">#</th>
								<th>Имя</th>
								<th>Email</th>
								<th>Роль</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach($users as $user)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{$user->name }}</td>
									<td>{{$user->email }}</td>
									<td>
									<form class="form-inline" action="{{ route('users.index') }}" method="post">
										@csrf
										<input type="hidden" value="{{ $user->id }}">
										<div class="form-group mx-sm-2 mb-2">
											<input type="hidden" name="id" value="{{ $user->id }}">
											<select class="custom-select" name="is_admin">
												@foreach($roles as $role)
													@if($role['value'] == $user->is_admin)
														<option selected="" value="{{ $role['value'] }}">{{ $role['title'] }}</option>
													@else
														<option value="{{ $role['value'] }}">{{ $role['title'] }}</option>
													@endif
												@endforeach
											</select>
										</div>
										<div class="form-group mx-sm-2">
										<button type="submit" class="btn btn-success btn-sm mb-2"><i class="fas fa-check"></i></button>
										</div>
									</form>
									</td>
									<td>
									<form action="{{ route('users.index') }}" method="post">
										@csrf
										@method('DELETE')
										<input type="hidden" name="id" value="{{ $user->id }}">
										<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Подтвердите удаление')">
											<i class="fas fa-trash-alt"></i>
										</button>
									</form>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table><br>
					{{ $users->links() }}
				@else
					<p>Пользователей пока нет...</p>
				@endif
			</div>
		</div>
		<!-- /.card -->

	</section>
@endsection
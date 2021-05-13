@extends('admin.layouts.layout')

@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-info">
					<div class="inner">
						<h3>{{ $posts }}</h3>
						<p>All Posts</p>
					</div>
					<div class="icon">
						<i class="ion ion-document"></i>
					</div>
					<a href="{{ route('posts.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-success">
					<div class="inner">
						<h3>{{ $tags }}</h3>
						<p>All Tags</p>
					</div>
					<div class="icon">
						<i class="ion ion-pricetags"></i>
					</div>
					<a href="{{ route('tags.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-warning">
					<div class="inner">
						<h3>{{ $users }}</h3>
						<p>All Users</p>
					</div>
					<div class="icon">
						<i class="ion ion-person"></i>
					</div>
					<a href="{{ route('users.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-danger">
					<div class="inner">
						<h3>{{ $categories }}</h3>
						<p>All Categories</p>
					</div>
					<div class="icon">
						<i class="ion ion-grid"></i>
					</div>
					<a href="{{ route('categories.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
		</div>
	</div>
</section>
@endsection
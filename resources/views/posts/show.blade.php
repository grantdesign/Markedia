@extends('layouts.main_layout')

@section('content')
<div class="page-wrapper">
	<div class="blog-title-area">
		<ol class="breadcrumb hidden-xs-down">
			<li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
			<li class="breadcrumb-item"><a href="{{ route('categories.single', $post->category->slug) }}">{{ $post->category->title }}</a></li>
			<li class="breadcrumb-item active">{{ $post->title }}</li>
		</ol>

		<span class="color-yellow"><a href="{{ route('categories.single', $post->category->slug) }}" title="">{{ $post->category->title }}</a></span>

		<h3>{{ $post->title }}</h3>

		<div class="blog-meta big-meta">
			<small><a href="{{ route('posts.single', $post->slug) }}" title="">{{ $post->created_at->format('d F, Y') }}</a></small>
			<small><a href="{{ route('posts.single', $post->slug) }}" title=""><i class="fa fa-eye"></i> {{ $post->views }}</a></small>
		</div><!-- end meta -->

	</div><!-- end title -->

	<div class="single-post-media">
		<img src="{{ asset('uploads/'.$post->thumbnail) }}" alt="" class="img-fluid">
	</div><!-- end media -->

	<div class="blog-content">
		{!! $post->content !!}
	</div><!-- end content -->

	<div class="blog-title-area">
		@if($post->tags->count() > 0)
			<div class="tag-cloud-single">
				<span>Tags</span>
				@foreach($post->tags as $tag)
					<small><a href="{{ route('tags.single', $tag->slug) }}" title="">{{ $tag->title }}</a></small>
				@endforeach
			</div>
		@endif

	</div><!-- end title -->

	@if(!$comments->isEmpty())
	<div class="custombox mt-5 clearfix">
		<h4 class="small-title">{{ $comments->count() }} Comments</h4>
		<div class="row">
			<div class="col-lg-12">
				<div class="comments-list">
					@foreach($comments as $comment)
						@if($comment->is_check)
						<div class="media">
							<a class="media-left">
								<img src="{{ asset('assets/front/upload/author.jpg') }}" alt="" class="rounded-circle">
							</a>
							<div class="media-body">
								<h4 class="media-heading user_name">{{ $comment->name }} <small>5 days ago</small></h4>
								<p>{{ $comment->text }}</p>
							</div>
						</div>
						@endif
					@endforeach
				</div>
			</div><!-- end col -->
		</div><!-- end row -->
	</div><!-- end custom-box -->
	@endif

	<hr class="invis1">

	<div class="custombox clearfix">
		<h4 class="small-title">Оставьте комментарий</h4>

		@if(session()->has('status'))
		    <div class="alert alert-success">
		        {{ session('status') }}
		    </div>
		@endif

		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		            <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif

		<div class="row">
			<div class="col-lg-12">
				<form class="form-wrapper" action="{{ route('comment.store', $post->slug) }}" method="post">
					@csrf
					<input type="text" class="form-control" name="name" placeholder="Имя" value="{{ old('name') }}">
					<input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
					<input type="text" class="form-control" name="site" placeholder="Сайт" value="{{ old('site') }}">
					<textarea class="form-control" name="text" placeholder="Комментарий">{{ old('text') }}</textarea>
					<input type="hidden" name="post_id" value="{{ $post->id }}">
					<button type="submit" class="btn btn-primary">Отправить</button>
				</form>
			</div>
		</div>
	</div>
</div><!-- end page-wrapper -->
@endsection
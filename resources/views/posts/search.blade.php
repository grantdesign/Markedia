@extends('layouts.main_layout')

@section('content')
	@if(!$posts->isEmpty())
	<div class="page-wrapper">
		<div class="blog-custom-build">
			<h3>По запросу "{{ $s }}" найдено:</h3>

			@foreach($posts as $post)
				<div class="blog-box wow fadeIn">
					<div class="post-media">
						<a href="{{ route('posts.single', $post->slug) }}" title="">
							<img src="{{ asset('uploads/'.$post->thumbnail) }}" alt="" class="img-fluid">
							<div class="hovereffect">
								<span></span>
							</div>
							<!-- end hover -->
						</a>
					</div>
					<!-- end media -->
					<div class="blog-meta big-meta text-center">
						
						<h4><a href="{{ route('posts.single', $post->slug) }}" title="">{{ $post->title }}</a></h4>
						<p>{{ $post->description }}</p>
						<small><a href="{{ route('categories.single', $post->category->slug) }}" title="">{{ $post->category->title }}</a></small>
						<small><a href="{{ route('posts.single', $post->slug) }}" title="">{{ $post->created_at->format('d F, Y') }}</a></small>
						<small><a href="{{ route('posts.single', $post->slug) }}" title=""><i class="fa fa-eye"></i> {{ $post->views }}</a></small>
					</div><!-- end meta -->
				</div><!-- end blog-box -->
				<hr class="invis">
			@endforeach

		</div>
	</div>
	<hr class="invis">
	<div class="row">
		<div class="col-md-12">
			<nav aria-label="Page navigation">
				{{ $posts->links() }}
			</nav>
		</div><!-- end col -->
	</div><!-- end row -->
	@else
	<h3>По запросу "{{ Request::get('s') }}" ничего не найдено.</h3>
	@endif
@endsection
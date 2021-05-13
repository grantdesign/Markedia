@extends('layouts.main_layout')

@section('header')
<section id="cta" class="section">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-12 align-self-center">
				<h2>A digital marketing blog</h2>
				<p class="lead"> Aenean ut hendrerit nibh. Duis non nibh id tortor consequat cursus at mattis felis. Praesent sed lectus et neque auctor dapibus in non velit. Donec faucibus odio semper risus rhoncus rutrum. Integer et ornare mauris.</p>
				@guest
				<a href="{{ route('register.create') }}" class="btn btn-primary">Try for free</a>
				@endguest
			</div>
		</div>
	</div>
</section>
@endsection

@section('content')
<div class="page-wrapper">
	<div class="blog-custom-build">

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
@endsection
@extends('layouts.category_layout')

@section('page-title')
<div class="page-title db">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h2>{{ $tag->title }} <small class="hidden-xs-down hidden-sm-down">Nulla felis eros, varius sit amet volutpat non.</small></h2>
            </div><!-- end col -->
            <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
                    <li class="breadcrumb-item active">{{ $tag->title }}</li>
                </ol>
            </div><!-- end col -->                    
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end page-title -->
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
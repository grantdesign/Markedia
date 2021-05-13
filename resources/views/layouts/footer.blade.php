<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <div class="widget">
                <h2 class="widget-title">Последние статьи</h2>
                <div class="blog-list-widget">
                    <div class="list-group">
                        @foreach($recent_posts as $recent_post)
                            <a href="{{ route('posts.single', $recent_post->slug) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="w-100 justify-content-between">
                                    <img src="{{ asset('uploads/'.$recent_post->thumbnail) }}" alt="" class="img-fluid float-left">
                                    <h5 class="mb-1">{{ Str::words($recent_post->title, 10) }}</h5>
                                    <small>{{ $recent_post->created_at->format('d F, Y') }}</small>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div><!-- end blog-list -->
            </div><!-- end widget -->
        </div><!-- end col -->

        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <div class="widget">
                <h2 class="widget-title">Популярные статьи</h2>
                <div class="blog-list-widget">
                    <div class="list-group">
                        @foreach($popular_posts as $popular_post)
                            <a href="{{ route('posts.single', $popular_post->slug) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="w-100 justify-content-between">
                                    <img src="{{ asset('uploads/'.$popular_post->thumbnail) }}" alt="" class="img-fluid float-left">
                                    <h5 class="mb-1">{{ Str::words($popular_post->title, 10) }}</h5>
                                    <span class="rating">
                                        @for($i=0; $i < 5; $i++)
                                            <i class="fa fa-star"></i>
                                        @endfor
                                    </span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div><!-- end blog-list -->
            </div><!-- end widget -->
        </div><!-- end col -->

        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <div class="widget">
                <h2 class="widget-title">Категории</h2>
                <div class="link-widget">
                    <ul>
                        @foreach($cats as $cat)
                            <li><a href="{{ route('categories.single', $cat->slug) }}">{{ $cat->title }} <span>({{ $cat->posts_count }})</span></a></li>
                        @endforeach
                    </ul>
                </div><!-- end link-widget -->
            </div><!-- end widget -->
        </div><!-- end col -->
    </div><!-- end row -->

    <div class="row">
        <div class="col-md-12 text-center">
            <br>
            <br>
            <div class="copyright">&copy; {{ date('Y') }} <a href="{{ route('home') }}">Markedia Design</a></div>
        </div>
    </div>
</div><!-- end container -->
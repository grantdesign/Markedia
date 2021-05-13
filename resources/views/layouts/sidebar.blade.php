<div class="sidebar">
    @if(!Request::is('/'))
        <div class="widget-no-style">
            <div class="newsletter-widget text-center align-self-center">

                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <h3>Subscribe Today!</h3>
                <p>Subscribe to our weekly Newsletter and receive updates via email.</p>
                <form class="form-inline" action="{{ route('subscribe') }}" method="post">
                    @csrf
                    <input type="email" name="email" placeholder="Add your email here.." required class="form-control" />
                    <input type="submit" value="Subscribe" class="btn btn-default btn-block" />
                </form>
            </div><!-- end newsletter -->
        </div>
    @endif

    @if(!Request::is('profile') && !Request::is('contacts'))
        <div class="widget">
            <h2 class="widget-title">Популярные статьи</h2>
            <div class="blog-list-widget">
                <div class="list-group">
                    @foreach($popular_posts as $popular_post)
                        <a href="{{ route('posts.single', $popular_post->slug) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="w-100 justify-content-between">
                                <img src="{{ asset('uploads/'.$popular_post->thumbnail) }}" alt="" class="img-fluid float-left">
                                <h5 class="mb-1">{{ Str::words($popular_post->title, 10) }}</h5>
                                <small>{{ $popular_post->created_at->format('d F, Y') }}</small>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div><!-- end blog-list -->
        </div><!-- end widget -->
    @endif

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
</div><!-- end sidebar -->
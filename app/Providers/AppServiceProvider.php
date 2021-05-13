<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Post;
use App\Category;
use View;
use Cache;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['layouts.sidebar', 'layouts.footer'], function($view) {

            if (Cache::has('recent_posts')) {
                $recent_posts = Cache::get('recent_posts');
            } else {
                $recent_posts = Post::orderBy('id', 'desc')->limit(3)->get();
                Cache::put('recent_posts', $recent_posts, 3600);
            }

            if (Cache::has('popular_posts')) {
                $popular_posts = Cache::get('popular_posts');
            } else {
                $popular_posts = Post::orderBy('views', 'desc')->limit(3)->get();
                Cache::put('popular_posts', $popular_posts, 3600);
            }

            if (Cache::has('cats')) {
                $cats = Cache::get('cats');
            } else {
                $cats = Category::withCount('posts')->orderBy('posts_count', 'desc')->get();
                Cache::put('cats', $cats, 3600);
            }

            $view->with([
                'recent_posts' => $recent_posts,
                'popular_posts' => $popular_posts,
                'cats' => $cats,
            ]);
        });
    }
}

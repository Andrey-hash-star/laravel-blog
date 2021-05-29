<?php

namespace App\Providers;

use App\Category;
use App\Post;
use Illuminate\Support\ServiceProvider;

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
        view()->composer(['layouts.main_layout', 'layouts.category_tag_layout'], function ($view) {
            $view->with('categories', Category::orderBy('id', 'desc')->limit(3)->get());
        });

        view()->composer(['layouts.sidebar', 'layouts.footer'], function ($view) {
            $view->with('popular_posts', Post::orderBy('view', 'desc')->limit(4)->get());
            $view->with('cats', Category::withCount('posts')->orderBy('posts_count', 'desc')->get());
        });
    }
}

<?php

namespace App\Providers;

use Cache;
use App\Models\Article;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    Paginator::useBootstrap();

    \Debugbar::enable();

    // $articles = Cache::remember('articles', 10, function () {
    //   return Article::all();
    // });
  }
}

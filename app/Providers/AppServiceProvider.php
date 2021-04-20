<?php

namespace App\Providers;

use App\View\Components\Home\{About,
  ActiveDevelopers,
  Advantage,
  Portfolio,
  Procedure,
  QuickStart,
  Tasks,
  TopCategories,
  TopDevelopers};
use App\View\Components\Main\{
  Footer,
  Hamburger,
  Header,
  LeftMenu,
  Logo,
  RightMenu
};
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
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
    // main
    Blade::component(Hamburger::class, 'main-hamburger');
    Blade::component(Logo::class, 'main-logo');
    Blade::component(Header::class, 'main-header');
    Blade::component(LeftMenu::class, 'main-left-menu');
    Blade::component(RightMenu::class, 'main-right-menu');
    Blade::component(Footer::class, 'main-footer');

    // home
    Blade::component(QuickStart::class, 'home-quick-start');
    Blade::component(Procedure::class, 'home-procedure');
    Blade::component(About::class, 'home-about');
    Blade::component(Advantage::class, 'home-advantage');
    Blade::component(ActiveDevelopers::class, 'home-active-developers');
    Blade::component(TopDevelopers::class, 'home-top-developers');
    Blade::component(Tasks::class, 'home-tasks');
    Blade::component(Portfolio::class, 'home-portfolio');
    Blade::component(TopCategories::class, 'home-top-categories');
    Paginator::useBootstrap();
  }
}

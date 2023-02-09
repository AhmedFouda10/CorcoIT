<?php

namespace App\Providers;

use App\Repository\Modules\Category\CategoryInterface;
use App\Repository\Modules\Category\DBcategory;
use App\Repository\Modules\News\DBnews;
use App\Repository\Modules\News\NewsInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CategoryInterface::class,DBcategory::class);
        $this->app->bind(NewsInterface::class,DBnews::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

<?php

namespace Modules\PageBlocks\app\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\PageBlocks\app\PageBlocks\BannerBlock;

class PageBlocksServiceProvider extends ServiceProvider
{
    protected string $moduleName = 'PageBlocks';

    protected string $moduleNameLower = 'pageblocks';

    /**
     * Boot the application events.
     */
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'pageblocks');
        $this->registerPageBlocks();

        $this->publishes(
            [
                __DIR__.'/../../config/config.php' => config_path('page-blocks.php'),
            ],
            'page-blocks-config'
        );
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/config.php', 'pageblocks');
    }

    protected function registerPageBlocks()
    {
        new BannerBlock();
    }

}

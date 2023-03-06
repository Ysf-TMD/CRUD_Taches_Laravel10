<?php

namespace App\Providers;

use Illuminate\Pagination\PaginationServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        //ajouter pagination ;
        Paginator::useBootstrap();
        //ajouter directive ;
        Blade::if('acomplie',function($expr)
        {
            return (empty(with($expr)) || with($expr) === 'N' ? false : true);
        }
        );
                Blade::directive(
                    'frdatetime',
                    function ($expr) {
                        $ret = "<?php ";
                        $ret .= "setlocale(LC_TIME, 'fr_FR');";
                        $ret .= "echo Carbon\Carbon::parse(with({$expr}))->formatLocalized(\"%A %d %B %Y\");";
                        $ret .= "?>";
                        return $ret;
        }
        );

    }
}

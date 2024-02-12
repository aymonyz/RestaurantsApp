<?php

// في App\Providers\AppServiceProvider.php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\BranchData;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('cards', function ($view) {
            $view->with('branches', BranchData::all());
        });
    }

}

   
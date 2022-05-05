<?php

namespace App\Providers;

use App\Models\Category;
use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

class AdminSectionsServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $sections = [
        \App\Models\User::class => 'App\Http\Sections\Users',
        \App\Models\Oven::class => 'App\Http\Sections\Ovens',
        \App\Models\Category::class =>'App\Http\Sections\Categories',
       // \App\Models\Administrator::class =>'App\Http\Sections\Administrators',
        \App\Models\Call::class=>'App\Http\Sections\Calls',
        \App\Models\Order::class=> 'App\Http\Sections\Orders'
    ];

    /**
     * Register sections.
     *
     * @param \SleepingOwl\Admin\Admin $admin
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin)
    {

        parent::boot($admin);
    }
}

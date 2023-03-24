<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'App\Events\ParqueRecord' => [
            'App\Http\Controllers\HistoricoController@ParqueRecord'
        ],
        'App\Events\RolRecord' => [
            'App\Http\Controllers\HistoricoController@RolRecord'
        ],
        'App\Events\UserRecord' => [
            'App\Http\Controllers\HistoricoController@UserRecord'
        ],
        'App\Events\RecursosRecord' => [
            'App\Http\Controllers\HistoricoController@InventarioRecord'
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}

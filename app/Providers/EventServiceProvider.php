<?php

namespace App\Providers;

use App\Events\OrderReviewed;
use App\Listeners\UpdateProductRating;
use App\Listeners\SendOrderPaidMail;
use App\Events\OrderPaid;
use App\Listeners\UpdateProductSoldCount;
use App\Listeners\RegisteredListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    // protected $listen = [
    //     'App\Events\Event' => [
    //         'App\Listeners\EventListener',
    //     ],
    // ];
    protected $listen = [
        Registered::class => [
            RegisteredListener::class,
        ],

        OrderPaid::class => [
            UpdateProductSoldCount::class,
            SendOrderPaidMail::class,
        ],

        OrderReviewed::class => [
            UpdateProductRating::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}

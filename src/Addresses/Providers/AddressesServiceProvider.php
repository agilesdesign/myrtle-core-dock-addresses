<?php

namespace Myrtle\Core\Addresses\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Myrtle\Addresses\Exceptions\AddressTypeHasAddressesException;
use Myrtle\Addresses\Models\AddressType;

class AddressesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen('eloquent.deleting: ' . AddressType::class, function ($type)
        {
            if(! $type->addresses->isEmpty())
            {
                throw new AddressTypeHasAddressesException;
            }
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

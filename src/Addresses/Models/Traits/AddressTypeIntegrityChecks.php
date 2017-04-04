<?php

namespace Myrtle\Core\Addresses\Models\Traits;

use Myrtle\Roles\Models\Observers\AddressTypeIntegrityChecksObserver;

trait AddressTypeIntegrityChecks
{
    /**
     * Extend booting of AddressType
     */
	public static function bootAddressTypeIntegrityChecks()
	{
		static::observe(AddressTypeIntegrityChecksObserver::class);
	}
}
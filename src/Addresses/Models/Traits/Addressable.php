<?php

namespace Myrtle\Core\Addresses\Models\Traits;

use Myrtle\Addresses\Models\Address;

trait Addressable
{
    /**
     * Get all of the owning model's addresses.
     */
	public function addresses()
	{
		return $this->morphMany(Address::class, 'addressable');
	}
}
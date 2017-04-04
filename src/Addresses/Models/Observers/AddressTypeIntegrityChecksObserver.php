<?php

namespace Myrtle\Core\Addresses\Models\Observers;

use Myrtle\Addresses\Models\AddressType;
use Myrtle\Addresses\Exceptions\AddressTypeHasAddressesException;

class AddressTypeIntegrityChecksObserver
{
    /**
     * Execute before address type is deleted
     * @param AddressType $type
     */
    public function deleting(AddressType $type)
    {
        $this->canBeDeleted($type);
    }

    /**
     * @param AddressType $type
     * @throws AddressTypeHasAddressesException
     */
    protected function canBeDeleted(AddressType $type)
    {
        if ($type->addresses->isEmpty()) {
            throw new AddressTypeHasAddressesException;
        }
    }
}

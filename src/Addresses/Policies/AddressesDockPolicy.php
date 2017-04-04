<?php

namespace Myrtle\Core\Addresses\Policies;

use App\User;
use Myrtle\Docks\AddressesDock;
use Myrtle\Addresses\Models\AddressType;
use Illuminate\Auth\Access\HandlesAuthorization;

class AddressesDockPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the user has access to Addresses Dock Administrative Routes
     *
     * @param  \App\User $user
     * @return bool
     */
    public function accessAdmin(User $user)
    {
        return $user->allPermissions->contains(function ($ability) use ($user) {
            return $ability->name === AddressesDock::class . '.access-admin';
        });
    }

    /**
     * Determine if the user has Administrator privileges
     *
     * @param  \App\User $user
     * @return bool
     */
    public function admin(User $user)
    {
        return $user->allPermissions->contains(function ($ability) {
            return $ability->name === AddressesDock::class . '.admin';
        });
    }

    /**
     * Determine if the user can edit Dock Settings
     *
     * @param  \App\User $user
     * @return bool
     */
    public function editSettings(User $user)
    {
        return $user->allPermissions->contains(function ($ability) {
            return $ability->name === AddressesDock::class . '.edit-settings';
        });
    }

    /**
     * Determine if the user can view Dock Settings
     *
     * @param  \App\User $user
     * @return bool
     */
    public function viewSettings(User $user)
    {
        return $user->allPermissions->contains(function ($ability) {
            return $ability->name === AddressesDock::class . '.view';
        });
    }

    /**
     * Determine if the user can edit Dock Permissions
     *
     * @param  \App\User $user
     * @return bool
     */
    public function editPermissions(User $user)
    {
        return $user->allPermissions->contains(function ($ability) {
            return $ability->name === AddressesDock::class . '.edit-settings';
        });
    }

    /**
     * Determine if the user can view Dock Permissions
     *
     * @param  \App\User $user
     * @return bool
     */
    public function viewPermissions(User $user)
    {
        return $user->allPermissions->contains(function ($ability) {
            return $ability->name === AddressesDock::class . '.view';
        });
    }

    /**
     * Determine if the user can create address types
     *
     * @param  \App\User $user
     * @return bool
     */
    public function addressTypeCreate(User $user)
    {
        return $user->allPermissions->contains(function ($ability) {
            return $ability->name === AddressesDock::class . '.' . AddressType::class . '.create';
        });
    }

    /**
     * Determine if the user can delete address types
     *
     * @param  \App\User $user
     * @return bool
     */
    public function addressTypeEdit(User $user)
    {
        return $user->allPermissions->contains(function ($ability) {
            return $ability->name === AddressesDock::class . '.' . AddressType::class . '.edit';
        });
    }

    /**
     * Determine if the user can delete address types
     *
     * @param  \App\User $user
     * @return bool
     */
    public function addressTypeDelete(User $user)
    {
        return $user->allPermissions->contains(function ($ability) {
            return $ability->name === AddressesDock::class . '.' . AddressType::class . '.delete';
        });
    }

    /**
     * Determine if the user can delete address types
     *
     * @param  \App\User $user
     * @return bool
     */
    public function addressTypeList(User $user)
    {
        return $user->allPermissions->contains(function ($ability) {
            return $ability->name === AddressesDock::class . '.' . AddressType::class . '.list';
        });
    }

    /**
     * Determine if the user can view address types
     *
     * @param  \App\User $user
     * @return bool
     */
    public function addressTypeSeed(User $user)
    {
        return $user->allPermissions->contains(function () use ($user) {
            return $this->admin($user);
        });
    }

    /**
     * Determine if the user can view address types
     *
     * @param  \App\User $user
     * @return bool
     */
    public function addressTypeView(User $user)
    {
        return $user->allPermissions->contains(function ($ability) {
            return $ability->name === AddressesDock::class . '.' . AddressType::class . '.view';
        });
    }
}

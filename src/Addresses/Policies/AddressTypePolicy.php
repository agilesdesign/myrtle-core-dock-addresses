<?php

namespace Myrtle\Core\Addresses\Policies;

use App\User;
use Myrtle\Core\Docks\AddressesDock;
use Illuminate\Support\Facades\Gate;
use Myrtle\Addresses\Models\AddressType;
use Illuminate\Auth\Access\HandlesAuthorization;

class AddressTypePolicy
{
    use HandlesAuthorization;

    /**
     * Intercept all checks
     *
     * @return bool
     */
    public function before()
    {
        if (Gate::allows('admin', AddressesDockPolicy::class)) {
            return true;
        }
    }

    /**
     * Determine if the user can create address types
     *
     * @param  \App\User $user
     * @return bool
     */
    public function create(User $user)
    {
        return $user->allPermissions->contains(function () {
            return Gate::allows('addressTypeCreate', AddressesDock::class);
        });
    }

    /**
     * Determine if the user can delete one or all address types
     *
     * @param  \App\User $user
     * @param AddressType $type
     * @return bool
     */
    public function delete(User $user, AddressType $type = null)
    {
        return $user->allPermissions->contains(function ($ability) use ($type) {
            return Gate::allows('addressTypeDelete', AddressesDock::class)
                || $ability->name === get_class($type) . '.' . $type->abilityIdentifier . '.delete';
        });
    }

    /**
     * Determine if the user can edit one or all address types
     *
     * @param  \App\User $user
     * @param AddressType $type
     * @return bool
     */
    public function edit(User $user, AddressType $type = null)
    {
        return $user->allPermissions->contains(function ($ability) use ($type) {
            return Gate::allows('addressTypeEdit', AddressesDock::class)
                || $ability->name === get_class($type) . '.' . $type->abilityIdentifier . '.edit';
        });
    }

    /**
     * Determine if the user can view routes with lists of address types
     *
     * @param  \App\User $user
     * @return bool
     */
    public function list(User $user)
    {
        return $user->allPermissions->contains(function () use ($type) {
            return Gate::allows('addressTypeList', AddressesDock::class);
        });
    }

    /**
     * Determine if the user can view one or all address types
     *
     * @param  \App\User $user
     * @param AddressType $type
     * @return bool
     */
    public function view(User $user, AddressType $type = null)
    {
        return $user->allPermissions->contains(function ($ability) use ($type) {
            return Gate::allows('addressTypeView', AddressesDock::class)
                || $ability->name === get_class($type) . '.' . $type->abilityIdentifier . '.view';
        });
    }
}

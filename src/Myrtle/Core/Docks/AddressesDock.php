<?php

namespace Myrtle\Core\Docks;

use Illuminate\Support\Facades\View;
use Myrtle\Addresses\Models\AddressType;
use Myrtle\Addresses\Policies\AddressTypePolicy;
use Myrtle\Addresses\Policies\AddressesDockPolicy;
use Myrtle\Addresses\Exceptions\AddressTypeHasAddressesException;
use Myrtle\Addresses\Handlers\AddressTypeHasAddressesExceptionAbettor;

class AddressesDock extends Dock
{
    /**
     * Description for Dock
     *
     * @var string
     */
    public $description = 'Address and Address Type system';

    /**
     * Exceptum mappings
     *
     * @var array
     */
    public $exceptumMap = [
        AddressTypeHasAddressesException::class => AddressTypeHasAddressesExceptionAbettor::class,
    ];

    /**
     * Explicit Gate definitions
     *
     * @var array
     */
    public $gateDefinitions = [
        self::class . '.admin' => AddressesDockPolicy::class . '@admin',
        self::class . '.access-admin' => AddressesDockPolicy::class . '@accessAdmin',
        self::class . '.edit-settings' => AddressesDockPolicy::class . '@editSettings',
        self::class . '.view-settings' => AddressesDockPolicy::class . '@viewSettings',
        self::class . '.edit-permissions' => AddressesDockPolicy::class . '@editPermissions',
        self::class . '.view-permissions' => AddressesDockPolicy::class . '@viewPermissions',
    ];

    /**
     * Policy mappings
     *
     * @var array
     */
    public $policies = [
        AddressType::class => AddressTypePolicy::class,
        AddressesDockPolicy::class => AddressesDockPolicy::class,
        AddressTypePolicy::class => AddressTypePolicy::class,
    ];

    /**
     * List of config file paths to be loaded
     *
     * @return array
     */
    public function configPaths()
    {
        return [
            'abilities' => dirname(__DIR__, 2) . '/config/abilities.php',
            'docks.' . self::class => dirname(__DIR__, 2) . '/config/docks/addresses.php',
        ];
    }

    /**
     * List of migration file paths to be loaded
     *
     * @return array
     */
    public function migrationPaths()
    {
        return [
            dirname(__DIR__, 2) . '/database/migrations',
        ];
    }

    /**
     * List of routes file paths to be loaded
     *
     * @return array
     */
    public function routes()
    {
        return [
            'admin' => dirname(__DIR__, 2) . '/routes/admin.php',
        ];
    }

    /**
     * Boot View Composers
     */
    public function viewComposers()
    {
        View::composer(['admin::*.addresses.create', 'admin::*.addresses.edit', 'admin::docks.addresses.settings.edit'], function ($view) {
            $types = AddressType::pluck('name', 'id');

            $view->withTypes($types);
        });
    }
}

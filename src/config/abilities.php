<?php

return [
    \Myrtle\Core\Docks\AddressesDock::class => [
        'access-admin' => 'Access Administrative Routes',
        'admin' => 'Administrator',
        \Myrtle\Core\Addresses\Models\AddressType::class => [
            'create' => 'Create Address Types',
            'edit' => 'Edit Address Types',
            'delete' => 'Delete Address Types',
            'list' => 'Display lists of Address Types',
            'view' => 'View Address Types',
            'edit-settings' => 'Edit Dock Settings',
            'view-settings' => 'View Dock Settings',
            'edit-permissions' => 'Edit Dock Permissions',
            'view-permissions' => 'View Dock Permissions',
        ],
    ]
];
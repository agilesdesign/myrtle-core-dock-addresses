<?php

namespace Myrtle\Core\Addresses\Http\Controllers\Administrator;

use Flasher\Support\Notifier;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Myrtle\Addresses\Models\AddressType;

class AddressTypesSeedController extends Controller
{
    /**
     * Show the seed form for the address types
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('seed', AddressType::class);

        $types = \AddressTypesTableSeeder::types();

        return view('admin::docks.addresses.types.seed.create')->withTypes($types);
    }

    /**
     * Store address type from seeder
     *
     * @return Response
     */
    public function store()
    {
        $this->authorize('seed', AddressType::class);

        Artisan::call('db:seed', ['--class' => \AddressTypesTableSeeder::class]);

        flasher()->alert('Address Types seeded successfully', Notifier::SUCCESS);

        return redirect()->route('admin.addresses.types.index');
    }
}

<?php

namespace Myrtle\Core\Addresses\Http\Controllers\Administrator;

use Flasher\Support\Notifier;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Myrtle\Addresses\Models\AddressType;
use Myrtle\Addresses\Http\Requests\SaveAddressTypeForm;

class AddressTypesController extends Controller
{
    /**
     * Show the list of address types
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize('list', AddressType::class);

        $types = AddressType::searched()->paginate();

        return view('admin::addresses.types.index')
            ->withTypes($types)
            ->withPolicy(AddressType::class);
    }

    /**
     * Show the create form for address type
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize(AddressType::class);

        return view('admin::addresses.types.create');
    }

    /**
     * Store address type
     *
     * @param SaveAddressTypeForm $form
     * @return Response
     */
    public function store(SaveAddressTypeForm $form)
    {
        $this->authorize(AddressType::class);

        $type = $form->process();

        flasher()->alert('Address type added successfully', Notifier::SUCCESS);

        return redirect()->route('admin.addresses.types.index', $type);
    }

    /**
     * Show the edit form for the address type
     *
     * @param AddressType $type
     * @return Response
     */
    public function edit(AddressType $type)
    {
        $this->authorize($type);

        return view('admin::addresses.types.edit')->withType($type);
    }

    /**
     * Update the address type
     *
     * @param SaveAddressTypeForm $form
     * @param AddressType $type
     * @return Response
     */
    public function update(SaveAddressTypeForm $form, AddressType $type)
    {
        $this->authorize(AddressType::class);

        $form->process($type);

        flasher()->alert('Address type updated successfully', Notifier::SUCCESS);

        return redirect()->route('admin.addresses.types.index');
    }

    /**
     * Delete the address type
     *
     * @param AddressType $type
     * @return Response
     */
    public function destroy(AddressType $type)
    {
        $this->authorize('delete', $type);

        $type->delete();

        flasher()->alert('Address type removed successfully', Notifier::SUCCESS);

        return redirect()->route('admin.addresses.types.index');
    }
}

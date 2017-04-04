<?php

namespace Myrtle\Core\Addresses\Handlers;

use Exception;
use Flasher\Support\Notifier;
use Exceptum\Contracts\Abettor;

class AddressTypeHasAddressesExceptionAbettor implements Abettor
{
    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Exception $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        flasher()->alert('Address Type is associated to addresses and cannot be removed', Notifier::DANGER);

        return redirect()->back();
    }
}
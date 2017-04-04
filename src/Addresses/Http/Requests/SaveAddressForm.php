<?php

namespace Myrtle\Core\Addresses\Http\Requests;

use Myrtle\Addresses\Models\Address;
use Illuminate\Foundation\Http\FormRequest;

class SaveAddressForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type_id' => 'required',
            'formatted' => 'required',
        ];
    }

    /**
     * Handle invoked form process
     *
     * @return mixed
     */
    public function process()
    {
        $method = debug_backtrace()[1]['function'];

        return call_user_func_array([$this, $method], func_get_args());
    }

    /**
     * Update address type with request data
     *
     * @param Address $address
     * @return Address
     */
    public function update(Address $address)
    {
        $address->update([
            'formatted' => $this->formatted,
            'type_id' => $this->type_id
        ]);

        return $address;
    }
}

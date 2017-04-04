<?php

namespace Myrtle\Core\Addresses\Http\Requests;

use Myrtle\Addresses\Models\AddressType;
use Illuminate\Foundation\Http\FormRequest;

class SaveAddressTypeForm extends FormRequest
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
            'name' => 'required'
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
     * Store address type with request data
     *
     * @return AddressType
     */
    public function store()
    {
        return AddressType::create([
            'name' => $this->name,
        ]);
    }

    /**
     * Update address type with request data
     *
     * @param AddressType $type
     * @return AddressType
     */
    public function update(AddressType $type)
    {
        $type->update([
            'name' => $this->name,
        ]);

        return $type;
    }
}

<?php

namespace Vanguard\Http\Requests\Promocode;

use Vanguard\Http\Requests\Request;
use Vanguard\Promocode;

class CreatePromocodeRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name'          => 'required',
            'email'         => 'required|email',
            'phone_number'  => 'required',
            'amount'        => 'required|min:1',
            'quantity'      => 'nullable',
        ];

        return $rules;
    }
}

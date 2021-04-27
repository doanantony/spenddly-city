<?php

namespace Vanguard\Transformers;

use League\Fractal\TransformerAbstract;
use Vanguard\Promocode;

class PromocodeTransformer extends TransformerAbstract
{
    public function transform(Promocode $promocode)
    {
        return [
            'id'            => (int) $promocode->id,
            'name'          => $promocode->name,
            'email'         => $promocode->email,
            'phone_number'  => $promocode->phone_number,
            'amount'        => $promocode->amount,
            'code'          => $promocode->code,
        ];
    }
}

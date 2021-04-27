<?php

namespace Vanguard\Repositories\Promocode;

use Vanguard\Events\Promocode\Created;
use Vanguard\Promocode;
use Cache;

class EloquentPromocode implements PromocodeRepository
{
    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return Promocode::all();
    }

    public function paginate($perPage, $search = null, $status = null)
    {
        $query = Promocode::query();

        if ($status) {
            $query->where('status', $status);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('code', "like", "%{$search}%");
                $q->orWhere('email', "like", "%{$search}%");
                $q->orWhere('amount', 'like', "%{$search}%");
            });
        }

        $result = $query->orderBy('id', 'desc')
            ->paginate($perPage);

        if ($search) {
            $result->appends(['search' => $search]);
        }

        if ($status) {
            $result->appends(['status' => $status]);
        }

        return $result;
    }


    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return Promocode::find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $data)
    {   
        $quantity = $data['quantity'];

        for ($i = 0; $i < $quantity; $i++) {
            $now = now();
            $randomcode = $now->year + 
                        $now->month + 
                        $now->day + 
                        $now->hour + 
                        $now->minute + 
                        $now->second + 
                        mt_rand(100, 1100);
            $promocode = "SPDLY". $randomcode;
            $data['code'] = $promocode;
            $promocode = Promocode::create($data);
        }

        return $promocode;
  
    }

    /**
     * {@inheritdoc}
     */
    public function update($id, array $data)
    {

    }

    /**
     * {@inheritdoc}
     */
    public function delete($id)
    {

    }
}

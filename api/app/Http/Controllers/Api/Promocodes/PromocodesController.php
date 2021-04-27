<?php

namespace Vanguard\Http\Controllers\Api\Promocodes;
use Vanguard\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Vanguard\Http\Requests\Promocode\CreatePromocodeRequest;
use Vanguard\Repositories\Promocode\PromocodeRepository;
use Vanguard\Transformers\PromocodeTransformer;
use Vanguard\Promocode;

/**
 * Class PromocodesController
 * @package Vanguard\Http\Controllers\Api\Promocodes
 */
class PromocodesController extends ApiController
{   
    /**
     * @var PromocodeRepository
     */
    private $promocodes;

    public function __construct(PromocodeRepository $promocodes)
    {
        $this->middleware('auth');
        $this->middleware('permission:promocodes.manage');

        $this->promocodes = $promocodes;
    }

    /**
     * Paginate all promocodes.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $promocodes = $this->promocodes->paginate(
            $request->per_page ?: 20,
            $request->search,
            $request->status
        );

        return $this->respondWithPagination(
            $promocodes,
            new PromocodeTransformer
        );
    }

    public function store(CreatePromocodeRequest $request)
    {   
        $data = $request->only([
            'name', 'email', 'phone_number', 'amount'
        ]);

        $data += [
            'status' => 'Active',
            'quantity' => $request->quantity ? $request->quantity : 1,
            'created_at' => now()
        ];

        $promocode = $this->promocodes->create($data);

        return $this->setStatusCode(201)
            ->respondWithItem($promocode, new PromocodeTransformer);
    }

}

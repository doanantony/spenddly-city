<?php

namespace Vanguard\Http\Controllers\Web\Promocodes;

use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Vanguard\Http\Controllers\Controller;
use Vanguard\Promocode;
use Vanguard\Repositories\Promocode\PromocodeRepository;
use Illuminate\Http\Request;
use Vanguard\Support\Enum\UserStatus;


/**
 * Class Promocodes Controller
 * @package Vanguard\Http\Controllers
 */
class PromocodesController extends Controller
{
    /**
     * @var Promocode Repository
     */
    private $promocodes;

    /**
     * Promocodes Controller constructor.
     * @param Promocode Repository $Promocodes
     */
    public function __construct(PromocodeRepository $promocodes)
    {
        $this->promocodes = $promocodes;
    }

    /**
     * Displays the page with all available Promocodes.
     *
     * @return Factory|View
     */
    public function index(Request $request)
    {

        $promocodes = $this->promocodes->paginate($perPage = 10, $request->search, $request->status);

        $statuses = ['' => __('All')] + UserStatus::lists();

        return view('promocode.index', compact('promocodes', 'statuses'));


    }

}

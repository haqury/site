<?php

namespace App\Http\Controllers;

use App\services\RPC;
use Illuminate\Routing\Controller as BaseController;

class IndexController extends BaseController
{
    const METHOD_PREFIX = 'balance.';
    const USER_BALANCE_METHOD = 'userBalance';
    const HISTORY_METHOD = 'history';

    private $historyParams = [
        "limit" => 50
    ];

    public function index()
    {
        return view('index', [
            'user' => (new RPC)->send(self::METHOD_PREFIX . self::USER_BALANCE_METHOD,
                    [
                        "user_id" => 1
                    ]
                )->getData(),
            'history' => (new RPC)->send(self::METHOD_PREFIX . self::HISTORY_METHOD, $this->historyParams)->getData()
        ]);
    }
}

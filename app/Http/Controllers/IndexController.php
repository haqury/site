<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\UserBalance;
use Illuminate\Routing\Controller as BaseController;

class IndexController extends BaseController
{
    public function index()
    {
        return view('index', [
            'user' => UserBalance::getUserBalance(1),
            'history' => History::getLimit()
        ]);
    }
}

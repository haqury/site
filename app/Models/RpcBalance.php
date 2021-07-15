<?php
/**
 * Created by PhpStorm.
 * User: haqury
 * Date: 15.07.21
 * Time: 21:54
 */

namespace App\Models;


use App\services\RPC;
use Illuminate\Support\Collection;

abstract class RpcBalance
{
    const METHOD_PREFIX = 'balance.';

    public function __construct($array)
    {
        foreach($array as $key => $value) {
            $this->$key = $value;
        }
    }

    protected static function getRpc()
    {
        return new RPC();
    }
}

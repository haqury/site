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

class History extends RpcBalance
{
    const METHOD = 'history';

    public $created_at;
    public $value;
    public $balance;
    public $user_id;

    /**
     * @param int $limit
     * @return self[]
     */
    public static function getLimit($limit = 50): array
    {
        $response = self::getRpc()->send(self::METHOD_PREFIX . self::METHOD, ['limit' => $limit]);
        if (!$response->isSuccess()) {

        }
        $result = [];
        foreach ($response->getData() as $item) {
            $result[] = new self($item);
        }
        return $result;
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: haqury
 * Date: 15.07.21
 * Time: 21:54
 */

namespace App\Models;


class UserBalance extends RpcBalance
{
    const USER_BALANCE_METHOD = 'userBalance';

    public $value;
    public $balance;
    public $user_id;
    
    public static function getUserBalance(int $userId): self
    {
        $response = self::getRpc()->send(self::METHOD_PREFIX . self::USER_BALANCE_METHOD,
            [
                "user_id" => $userId
            ]
        );
        if ($response->isSuccess()) {

        }
        return new self($response->getData());
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: haqury
 * Date: 15.07.21
 * Time: 20:40
 */

namespace App\Models;


class RpcResponse
{
    private $error;
    private $success;
    private $data;

    public function __construct(string $json)
    {
        $response = json_decode($json, true);
        $this->error = $response['error'] ?? null;
        $this->data = $response['result'] ?? null;
        $this->success = empty($this->error) && !empty($this->data);
    }

    public function getData()
    {
        return $this->data;
    }

    public function getError()
    {
        return $this->data;
    }

    public function isSuccess()
    {
        return $this->success;
    }
}

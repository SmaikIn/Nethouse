<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class RedisHelper extends Controller
{
    //
    /**
     * @return object
     * @throws \RedisException
     */

    public static function getRedis(): object
    {
        $redis = new \Redis();
        $redis->connect('127.0.0.1', 6379);
        $redis->select('0');
        return $redis;
    }
}

<?php

namespace App\Helpers;

class Flash
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    public static function success($message)
    {
        session()->flash('response', ['status' => 'success', 'message' => $message]);
    }
    public static function info($message)
    {
        session()->flash('response', ['status' => 'info', 'message' => $message]);
    }
    public static function warning($message)
    {
        session()->flash('response', ['status' => 'warning', 'message' => $message]);
    }
    public static function error($message)
    {
        session()->flash('response', ['status' => 'error', 'message' => $message]);
    }
    public static function clear()
    {
        session()->forget('response');
    }
}

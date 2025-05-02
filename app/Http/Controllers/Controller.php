<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function response($msg, $success, $data, $code)
    {
        return response()->json([
            'msg' => $msg,
            'success' => $success,
            'data' => $data,
            'code' => $code
        ]);
    }

}

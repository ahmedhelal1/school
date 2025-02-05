<?php

namespace App\Http\Controllers\Api;

trait ApiResponseTrait
{
    public function api_response($data = null, $message = null, $status = null)
    {
        $array = [
            'data' => $data,
            'status' => $status,
            'message' => $message
        ];
        return response($array);
    }
}

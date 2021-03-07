<?php


namespace App\Traits;


trait GeneralTrait
{
    public function returnSuccessMessage($msg = "", $code = "S000"): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status' => true,
            'code' => $code,
            'msg' => $msg,
        ], $code);
    }

    public function returnData($value, $code): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status' => true,
            'code' => $code,
            'data' => $value
        ], $code);
    }
}

<?php
namespace MailMarketing\Helpers;

class Helper
{

    /**
     * Convert array to json response.
     *
     * @static
     *
     * @param array   $inputArray Array data parameter.
     * @param integer $statusCode Http status code parameter.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public static function prettyJson(array $inputArray, $statusCode)
    {
        return response()->json($inputArray, $statusCode, ['Content-Type' => 'application/json'], JSON_PRETTY_PRINT);
    }
}

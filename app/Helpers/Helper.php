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

    /**
     * Extracting zip files.
     *
     * @static
     *
     * @param string $source      Source parameter.
     * @param string $destination Source parameter.
     *
     * @throws \Exception If any error raised when extract the archive file.
     *
     * @return boolean
     */
    public static function extractZip($source, $destination)
    {
        try {
            $result = false;
            $zipObject = new \ZipArchive;
            $resource = $zipObject->open($source);
            if ($resource === true) {
                $result = $zipObject->extractTo($destination);
                $zipObject->close();
            }
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
        return $result;
    }
}

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
     * Calculate age from the given date.
     *
     * @param string $dateParam Date parameter (Y-m-d) format.
     *
     * @return integer
     */
    public static function calculateAge($dateParam)
    {
        $date = explode('-', $dateParam);

        return (date('md', date('U', mktime(0, 0, 0, $date[1], $date[2], $date[0]))) > date('md')
            ? ((date('Y') - $date[0]) - 1)
            : (date('Y') - $date[0]));
    }

    /**
     * Translate code to value name.
     *
     * @param string $code     Code parameter.
     * @param string $category Category parameter.
     *
     * @return string
     */
    public static function translateCode($code, $category)
    {
        $codeArr = [
            'gender' => ['F' => 'Female', 'M' => 'Male']
        ];
        $result = '-';
        if (array_key_exists($category, $codeArr) === true) {
            $searchCode = $codeArr[$category];
            if (array_key_exists($code, $searchCode) === true) {
                $result = $searchCode[$code];
            }
        }

        return $result;
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

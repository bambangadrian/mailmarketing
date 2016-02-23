<?php
namespace MailMarketing\Helpers;

/**
 * Class Helper
 *
 * @package    Helpers
 * @subpackage -
 * @author     Bambang Adrian S <bambang.adrian@gmail.com>
 */
class Helper
{

    /**
     * Convert array to json response.
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
     * @param string $source      Source parameter.
     * @param string $destination Source parameter.
     *
     * @throws \RuntimeException If any error raised when extract the archive file.
     * @return boolean
     */
    public static function extractZip($source, $destination)
    {
        try {
            $result = false;
            $zipObject = new \ZipArchive();
            $resource = $zipObject->open($source);
            if ($resource === true) {
                $result = $zipObject->extractTo($destination);
                $zipObject->close();
            }
        } catch (\Exception $e) {
            throw new \RuntimeException($e->getMessage());
        }
        return $result;
    }

    /**
     * Create zip file from array of files.
     *
     * @param array   $files       Files array parameter.
     * @param string  $destination Zip filename destination parameter.
     * @param boolean $overWrite   Overwrite flag zip file if exists parameter.
     *
     * @return boolean
     */
    public static function createZip(array $files = [], $destination = '', $overWrite = false)
    {
        # If the zip file already exists and overwrite is false, return false.
        if (file_exists($destination) === true and $overWrite === false) {
            return false;
        }
        # Variable initialize.
        $validFiles = [];
        if (is_array($files) === true and count($files) > 0) {
            # Iterate through each file.
            foreach ($files as $file) {
                # Make sure the file exists.
                if (file_exists($file) === true) {
                    $validFiles[] = $file;
                }
            }
        }
        if (count($validFiles) > 0) {
            $overWriteZipFlag = \ZipArchive::CREATE;
            # Create the archive.
            $zipObject = new \ZipArchive();
            if ($overWrite === true) {
                $overWriteZipFlag = \ZipArchive::OVERWRITE;
            }
            if ($zipObject->open($destination, $overWriteZipFlag) !== true) {
                return false;
            }
            # Add the files to zip archive.
            foreach ($validFiles as $file) {
                $zipObject->addFile($file, $file);
            }
            $zipObject->close();
            # Check to make sure the zip archive file exists.
            return file_exists($destination);
        } else {
            return false;
        }
    }

    /**
     * Create zip from content string.
     *
     * @param string  $content   Content string parameter.
     * @param string  $fileName  Filename for content parameter.
     * @param string  $zipName   Zip file destination name parameter.
     * @param boolean $overWrite Overwrite zip file if exists parameter.
     *
     * @return boolean
     */
    public static function createZipFromString($content, $fileName, $zipName, $overWrite = false)
    {
        # If the zip file already exists and overwrite is false, return false.
        if (file_exists($zipName) === true and $overWrite === false) {
            return false;
        }
        $overWriteZipFlag = \ZipArchive::CREATE;
        # Create the archive.
        $zipObject = new \ZipArchive();
        if ($overWrite === true) {
            $overWriteZipFlag = \ZipArchive::OVERWRITE;
        }
        if ($zipObject->open($zipName, $overWriteZipFlag) !== true) {
            return false;
        } else {
            # Add content string to zip.
            $zipObject->addFromString($fileName, $content);
            $zipObject->close();
            return true;
        }
    }
}

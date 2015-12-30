<?php
namespace MailMarketing\Helpers;

use Illuminate\Support\Debug\Dumper;

class BootstrapHelper extends Helper
{

    /**
     * Get icon status.
     *
     * @static
     *
     * @param string $status
     *
     * @return string
     */
    public static function getIconStatus($status = 'success')
    {
        $iconArr = ['success' => 'fa-check'];
        $icon = '';
        if (array_key_exists($status, $iconArr) === true) {
            $icon = $iconArr[$status];
        }
        return $icon;
    }

    /**
     * Dump the passed variables and end the script.
     *
     * @param  mixed
     *
     * @return void
     */
    public static function dump()
    {
        array_map(
            function ($x) {
                (new Dumper)->dump($x);
            },
            func_get_args()
        );
    }
}

<?php
namespace MailMarketing\Helpers;

use Illuminate\Support\Debug\Dumper;

class BootstrapHelper extends Helper
{

    /**
     * Get yes no icon for bootstrap using.
     *
     * @static
     *
     * @param mixed $status Status flag value parameter.
     * @param array $map    The status map parameter.
     *
     * @return string
     */
    public static function getIconYesNo($status, array $map = [])
    {
        if (count($map) > 0) {
            # @todo implement the status map to get the yes-no icon.
        } else {
            $status = (boolean)$status;
        }
        $iconProp = ['class' => 'fa-remove iconYesNo', 'style' => 'color: red;'];
        if ($status === true) {
            $iconProp = ['class' => 'fa-check iconYesNo', 'style' => 'color: green;'];
        }
        return '<i class="fa ' . $iconProp['class'] . '" style="' . $iconProp['style'] . '"></i>';
    }

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

<?php
namespace MailMarketing\Helpers;

use Illuminate\Support\Debug\Dumper;

/**
 * Class BootstrapHelper
 *
 * @package    MailMarketing
 * @subpackage Helpers
 */
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
            // @todo implement the status map to get the yes-no icon.
        } else {
            $status = (boolean)$status;
        }
        $iconProp = ['class' => 'fa-remove iconYesNo', 'style' => 'color: red;'];
        if ($status === true) {
            $iconProp = ['class' => 'fa-check iconYesNo', 'style' => 'color: green;'];
        }

        return '<i class="fa '.$iconProp['class'].'" style="'.$iconProp['style'].'"></i>';
    }

    /**
     * Get icon status.
     *
     * @static
     *
     * @param string $status Status flag parameter.
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
     * Get ratio index collection into combo box.
     *
     * @param string $fieldName  Ratio field name.
     * @param string $selected   Selected option value parameter.
     * @param array  $attributes Additional attributes array parameter.
     *
     * @return string
     */
    public static function getRatioIndexToCombo($fieldName, $selected = '1', array $attributes = [])
    {
        $options = [1, 2, 3, 4, 5, 6, 7, 8, 9];

        return \Form::select(
            $fieldName,
            array_combine($options, $options),
            $selected,
            array_merge(['class' => 'form-control'], $attributes)
        );
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

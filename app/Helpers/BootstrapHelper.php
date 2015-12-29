<?php
namespace MailMarketing\Helpers;

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
}

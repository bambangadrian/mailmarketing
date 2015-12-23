<?php
namespace MailMarketing\Http\Composers;

use Illuminate\Contracts\View\View;

class DefaultComposer
{

    public function compose(View $view)
    {
        $view->with([]);
    }
}

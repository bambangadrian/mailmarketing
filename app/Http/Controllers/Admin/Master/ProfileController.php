<?php
namespace MailMarketing\Http\Controllers\Admin\Master;

use Illuminate\Http\Request;
use MailMarketing\Http\Controllers\Admin\AbstractAdminController;
use MailMarketing\Http\Requests;

class ProfileController extends AbstractAdminController
{

    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
}

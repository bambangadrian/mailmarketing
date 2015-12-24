<?php
namespace MailMarketing\Http\Controllers\Admin;

use Illuminate\Http\Request;
use MailMarketing\Http\Requests;

class DashboardController extends AbstractAdminController
{

    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->contentDir = $this->data['activeMenu'] = 'dashboard';
        $this->data['pageHeader'] = 'Dashboard';
        $this->data['pageDescription'] = '';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->renderPage();
    }
}

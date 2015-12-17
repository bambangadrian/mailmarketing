<?php
namespace MailMarketing\Http\Controllers;

use Illuminate\Http\Request;
use MailMarketing\Http\Requests;

class DashboardController extends AbstractPageController
{

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->contentName = $this->data['activeMenu'] = 'dashboard';
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

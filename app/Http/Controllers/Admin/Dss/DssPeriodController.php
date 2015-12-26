<?php
namespace MailMarketing\Http\Controllers\Admin\Dss;

use Illuminate\Http\Request;
use MailMarketing\Http\Controllers\Admin\AbstractAdminController;
use MailMarketing\Http\Requests;
use MailMarketing\Models\Dss;

class DssPeriodController extends AbstractAdminController
{

    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->contentDir = 'dss/period';
        $this->data['pageHeader'] = 'DSS Period';
        $this->data['pageDescription'] = 'Manage your decision support period';
        $this->data['activeMenu'] = 'dss';
        $this->data['activeSubMenu'] = 'dssPeriod';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['model'] = Dss::paginate(10);
        return $this->renderPage();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->renderPage('create');
    }
}

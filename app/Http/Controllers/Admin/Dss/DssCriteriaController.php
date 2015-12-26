<?php
namespace MailMarketing\Http\Controllers\Admin\Dss;

use Illuminate\Http\Request;
use MailMarketing\Http\Controllers\Admin\AbstractAdminController;
use MailMarketing\Http\Requests;
use MailMarketing\Models\DssCriteria;

class DssCriteriaController extends AbstractAdminController
{

    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->contentDir = 'dss/criteria';
        $this->data['pageHeader'] = 'DSS Criteria';
        $this->data['pageDescription'] = 'Manage your list of all criteria that will be used for decision support system';
        $this->data['activeMenu'] = 'dss';
        $this->data['activeSubMenu'] = 'dssCriteria';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['model'] = DssCriteria::paginate(10);
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

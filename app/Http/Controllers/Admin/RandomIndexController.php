<?php
namespace MailMarketing\Http\Controllers\Admin;

use Illuminate\Http\Request;
use MailMarketing\Http\Requests;
use MailMarketing\Models\DssRandomIndex;

class RandomIndexController extends AbstractAdminController
{

    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->contentDir = 'dss/randomIndex';
        $this->data['pageHeader'] = 'Random Index';
        $this->data['pageDescription'] = 'List all random index to check consistency';
        $this->data['activeMenu'] = 'dss';
        $this->data['activeSubMenu'] = 'randomIndex';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['model'] = DssRandomIndex::paginate(10);
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

<?php
namespace MailMarketing\Http\Controllers\Admin;

use Illuminate\Http\Request;
use MailMarketing\Http\Requests;
use MailMarketing\Models\CampaignType;

class CampaignTypeController extends AbstractAdminController
{

    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->contentDir = 'master/campaign/type';
        $this->data['pageHeader'] = 'Campaign Type';
        $this->data['pageDescription'] = 'Manage your campaign type';
        $this->data['activeMenu'] = 'master';
        $this->data['activeSubMenu'] = 'campaignType';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['model'] = CampaignType::paginate(10);
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

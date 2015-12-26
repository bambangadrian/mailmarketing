<?php
namespace MailMarketing\Http\Controllers\Admin;

use Illuminate\Http\Request;
use MailMarketing\Http\Requests;
use MailMarketing\Models\Campaign;

class CampaignController extends AbstractAdminController
{

    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->contentDir = 'mail/campaign';
        $this->data['pageHeader'] = 'Campaign';
        $this->data['pageDescription'] = 'Manage your campaign data';
        $this->data['activeMenu'] = 'mail';
        $this->data['activeSubMenu'] = 'mailCampaign';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['model'] = Campaign::with('campaignCategory', 'campaignTopic', 'campaignType', 'template')->paginate(10);
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

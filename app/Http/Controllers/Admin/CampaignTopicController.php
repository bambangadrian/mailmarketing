<?php
namespace MailMarketing\Http\Controllers\Admin;

use Illuminate\Http\Request;
use MailMarketing\Http\Requests;
use MailMarketing\Models\CampaignTopic;

class CampaignTopicController extends AbstractAdminController
{

    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->contentDir = 'master/campaign/topic';
        $this->data['pageHeader'] = 'Campaign Topic';
        $this->data['pageDescription'] = 'Manage your campaign topic';
        $this->data['activeMenu'] = 'master';
        $this->data['activeSubMenu'] = 'campaignTopic';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['model'] = CampaignTopic::paginate(10);
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

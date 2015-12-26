<?php
namespace MailMarketing\Http\Controllers\Admin;

use Illuminate\Http\Request;
use MailMarketing\Http\Requests;
use MailMarketing\Models\CampaignCategory;

class CampaignCategoryController extends AbstractAdminController
{

    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->contentDir = 'master/campaign/category';
        $this->data['pageHeader'] = 'Campaign Category';
        $this->data['pageDescription'] = 'Manage your campaign category';
        $this->data['activeMenu'] = 'master';
        $this->data['activeSubMenu'] = 'campaignCategory';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['model'] = CampaignCategory::paginate(10);
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

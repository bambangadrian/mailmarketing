<?php
namespace MailMarketing\Http\Controllers\Admin\Dss;

use MailMarketing\Http\Controllers\Admin\AbstractAdminController;
use MailMarketing\Models\Dss;

class DssPriorityController extends AbstractAdminController
{

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->setEnableCreate(false);
        parent::__construct();
        # Set custom reference key.
        $this->setReferenceKey('priority');
        # Set content directory.
        $this->contentDir = 'dss/priority';
        # Set page attributes.
        $this->data['pageHeader'] = 'DSS Priority';
        $this->data['pageDescription'] = 'Manage alternative priority calculation';
        $this->data['activeMenu'] = 'dss';
        $this->data['activeSubMenu'] = 'dssPriority';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['contentTitle'] = 'Please select period to calculate alternative priority ...';
        $this->data['model'] = Dss::active()
                                  ->notDeleted()
                                  ->where('Dss_CriteriaConsistencyRatio', '<', 0.1)
                                  ->paginate(10);

        return parent::index();
    }
}

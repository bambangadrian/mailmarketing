<?php
namespace MailMarketing\Http\Controllers\Admin\Dss;

use MailMarketing\Http\Controllers\Admin\AbstractAdminController;
use MailMarketing\Models\Dss;
use MailMarketing\Models\DssResult;

class DssResultController extends AbstractAdminController
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
        $this->contentDir = 'dss/priority/result';
        # Set page attributes.
        $this->data['pageHeader'] = 'DSS Ranking';
        $this->data['pageDescription'] = 'List of priority ranking result of selected dss period';
        $this->data['activeMenu'] = 'dss';
        $this->data['activeSubMenu'] = 'dssPriority';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param integer $dssID DSS ID row model parameter.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($dssID = null)
    {
        $this->data['enablePaging'] = false;
        $this->data['referenceValue'] = $this->getReferenceValue();
        $dssData = Dss::find($dssID);
        $this->data['contentTitle'] = $dssData->Dss_Name.'- ('.
            \Carbon\Carbon::createFromFormat('Y-m-d', $dssData->Dss_StartPeriod)->format('d F Y').' Until '.
            \Carbon\Carbon::createFromFormat('Y-m-d', $dssData->Dss_EndPeriod)->format('d F Y').') DSS Result';
        $this->data['model'] = DssResult::with([
            'alternative' => function ($query) use ($dssID) {
                $query->where('Dal_DssID', $dssID);
            },
        ])->orderBy('Dsr_Result', 'desc')->get();
        $this->data['buttons'] = $this->renderPartialView('navigation');

        return parent::index();
    }
}

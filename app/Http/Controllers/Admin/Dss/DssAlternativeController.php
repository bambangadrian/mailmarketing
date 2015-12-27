<?php
namespace MailMarketing\Http\Controllers\Admin\Dss;

use Illuminate\Http\Request;
use MailMarketing\Http\Controllers\Admin\AbstractAdminController;
use MailMarketing\Http\Requests;
use MailMarketing\Models\DssAlternative;

class DssAlternativeController extends AbstractAdminController
{

    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->contentDir = 'dss/alternative';
        $this->data['pageHeader'] = 'DSS Alternative';
        $this->data['pageDescription'] = 'Manage your list of all alternative that will be used for decision support system';
        $this->data['activeMenu'] = 'dss';
        $this->data['activeSubMenu'] = 'dssAlternative';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['model'] = DssAlternative::paginate(10);
        return $this->renderPage();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['pageDescription'] = 'Create new decision support alternative item';
        return $this->renderPage('create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return '';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = 'success';
        $message = 'test';
        $passedData = [
            'status'  => $status,
            'message' => $message
        ];
        return redirect()->action('Admin\Dss\DssAlternativeController@index')->with($passedData);
    }
}

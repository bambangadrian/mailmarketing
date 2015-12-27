<?php
namespace MailMarketing\Http\Controllers\Admin;

use Illuminate\Http\Request;
use MailMarketing\Http\Requests;
use MailMarketing\Models\MailTrackingStatus;

class TrackingStatusController extends AbstractAdminController
{

    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->contentDir = 'master/trackingStatus';
        $this->data['pageHeader'] = 'Tracking Status';
        $this->data['pageDescription'] = 'Manage tracking status data';
        $this->data['activeMenu'] = 'master';
        $this->data['activeSubMenu'] = 'trackStatus';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['model'] = MailTrackingStatus::paginate(10);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php
namespace MailMarketing\Http\Controllers;

use Illuminate\Http\Request;
use MailMarketing\Http\Requests;
use MailMarketing\Http\Controllers\Controller;

class DashboardController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd(\Auth::user()->campaigns);

        $data['tasks'] = [
            [
                'name'     => 'Design New Dashboard',
                'progress' => '87',
                'color'    => 'danger'
            ],
            [
                'name'     => 'Create Home Page',
                'progress' => '76',
                'color'    => 'warning'
            ],
            [
                'name'     => 'Some Other Task',
                'progress' => '32',
                'color'    => 'success'
            ],
            [
                'name'     => 'Start Building Website',
                'progress' => '56',
                'color'    => 'info'
            ],
            [
                'name'     => 'Develop an Awesome Algorithm',
                'progress' => '10',
                'color'    => 'success'
            ]
        ];
        return view('admin.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

<?php
namespace MailMarketing\Http\Controllers\Admin;

use Illuminate\Http\Request;
use MailMarketing\Http\Requests;

class TestController extends AbstractAdminController
{

    public function index()
    {
        $data['activeMenu'] = '';
        $data['activeSubMenu'] = '';
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
        return view('admin.template.sample.index')->with($data);
    }
}

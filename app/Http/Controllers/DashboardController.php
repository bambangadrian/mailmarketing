<?php
namespace MailMarketing\Http\Controllers;

use Illuminate\Http\Request;
use MailMarketing\Http\Requests;

class DashboardController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }
}

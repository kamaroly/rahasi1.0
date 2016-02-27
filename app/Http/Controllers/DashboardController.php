<?php

namespace Rahasi\Http\Controllers;

use Illuminate\Http\Request;

use Rahasi\Http\Requests;
use Rahasi\Http\Controllers\Controller;

class DashboardController extends Controller
{	
	/**
	 * Construct parent class since it's 
	 * the one with the user information
	 */
	function __construct()
	{
		parent::__construct();
	}

	/**
	 * Showing the dashboard for the current session
	 * @return view
	 */
    public function index()
    {
    	return view('dashboard.index');
    }
}

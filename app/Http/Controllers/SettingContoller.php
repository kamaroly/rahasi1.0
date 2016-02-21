<?php

namespace Rahasi\Http\Controllers;

use Illuminate\Http\Request;

use Rahasi\Http\Requests;
use Rahasi\Http\Controllers\Controller;

class SettingContoller extends Controller
{
	public function __construct()
	{
	    $this->middleware('sentry.member:MNOs');
	}

	public function keys()
	{
		# code...
	}
}

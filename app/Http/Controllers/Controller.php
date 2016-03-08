<?php

namespace Rahasi\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Sentry;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public $user;

	function __construct() {
		$this->user = Sentry::getUser();
		if (!empty($this->user->envirornment)) {
			DB::setDefaultConnection($this->user->envirornment);
		}
		
	}
}

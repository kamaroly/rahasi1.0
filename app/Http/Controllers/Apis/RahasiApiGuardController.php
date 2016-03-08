<?php 
namespace Rahasi\Http\Controllers\Apis;

use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Rahasi\Models\User;
use Rahasi\Repositories\ApiKeyRepository;

/**
* Api guard class
*/
class RahasiApiGuardController extends ApiGuardController
{
	public $key;
	
	function __construct(ApiKeyRepository $key)
	{
	 parent::__construct();
     $this->key = $key->getByKey(request()->header(Config::get('apiguard.keyName', 'X-Authorization')));	

     $this->initiate();
	}


	public function initiate()
	{
		
	}
}
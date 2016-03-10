<?php 

namespace Rahasi\Http\Controllers\Apis;

use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController;
use Rahasi\Repositories\ApiKeyRepository;

 class RahasiApiGuardController extends ApiGuardController
 {
 	
 	function __construct(ApiKeyRepository $key)
 	{
 		parent::__construct();
 		$keyName  = config('apiguard.keyName', 'X-Authorization');
 		$this->key = $key->getByKey(request()->header($keyName));
 	}
 } 
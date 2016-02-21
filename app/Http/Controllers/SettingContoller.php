<?php

namespace Rahasi\Http\Controllers;

use Cartalyst\Sentry\Sentry;
use Illuminate\Http\Request;
use Rahasi\Exceptions\ApiKeyNotGeneratedException;
use Rahasi\Exceptions\InvalidEnvironmentException;
use Rahasi\Http\Controllers\Controller;
use Rahasi\Http\Requests;
use Rahasi\Repositories\ApiKeyRepository;

class SettingContoller extends Controller
{
	protected $apikey;

	public function __construct(ApiKeyRepository $apikey)
	{
		$this->apikey = $apikey;

		parent::__construct();
	}

	/**
	 * Show api key per user
	 * @return 
	 */
	public function keys()
	{
		try
		{
		  dd($this->apikey->getKeysByUser(1));
		}
		catch(Exception $ex){
			return $ex->getMessage();
		}
	}

	/**
	 * Generate API for current logged in user
	 * @param  string $environment environment for the key
	 * @return object
	 */
	public function generateKey($environment='test')
	{		
		try{
			$key = $this->apikey->generateKey(1,$environment);
			if(!is_null($key)){
				return $key->key;
			}
		}
		catch (InvalidEnvironmentException $ex){
			return $ex->getMessage();
		}
		catch(ApiKeyNotGeneratedException $ex){
			return $ex->getMessage();
		}
		catch(\Exception $ex){
			return trans('general.internal_server_error_occured');
		}
	}
}

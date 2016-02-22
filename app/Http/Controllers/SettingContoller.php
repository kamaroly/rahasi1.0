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
		  $apikeys = $this->apikey->getKeysByUser($this->user->id);

		  return view('settings.apikeys',compact('apikeys'));
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
	public function generateKey($environment='test',$userid)
	{		
		try{
			$key = $this->apikey->generateKey($userid,$environment);
			return $this->keys();
		}
		catch (InvalidEnvironmentException $ex){
			return $this->keys();
		}
		catch(ApiKeyNotGeneratedException $ex){
			return $this->keys();
		}
		catch(\Exception $ex){
			return $this->keys();
		}
	}
}

<?php

namespace Rahasi\Http\Controllers;

use Cartalyst\Sentry\Sentry;
use Illuminate\Http\Request;
use Rahasi\Exceptions\ApiKeyNotGeneratedException;
use Rahasi\Exceptions\InvalidEnvironmentException;
use Rahasi\Http\Controllers\Controller;
use Rahasi\Http\Requests;
use Rahasi\Models\ApiKey;
use Rahasi\Repositories\ApiKeyRepository;
use Vinkla\Hashids\HashidsManager;

class SettingContoller extends Controller
{
	protected $apikey;

	public function __construct(HashidsManager $hashids,ApiKeyRepository $apikey)
	{
		$this->hashids = $hashids;
		$this->apikey = $apikey;
		parent::__construct();
	}

	public function index()
	{
		$apikeys = $this->apikey->getKeysByUser($this->user->id);
		return view('settings.index',compact('apikeys'));
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
		  return view('settings.index',compact('apikeys'));
		}
		catch(Exception $ex){
			Event::fire('exception.thrown', $ex);
			Log::critical($ex->getMessage());

			return redirect()->route('settings.index');
		}
	}

	/**
	 * Generate API for current logged in user
	 * @param  string $environment environment for the key
	 * @return object
	 */
	public function generateKey($environment='test',$hash)
	{		

		try{
			$userid = $this->hashids->decode($hash)[0];			
			$key = $this->apikey->generateKey($userid,$environment);

			if ($key->environment == 'test') {
				$result = ApiKey::where('user_id', $userid) ->update($key->toArray());

				// This is a new key
				if (empty($result)) {
					ApiKey::unguard();
					ApiKey::create($key->toArray());
				}
			}
	
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

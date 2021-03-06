<?php 
namespace Rahasi\Repositories;
use Chrisbjr\ApiGuard\Models\ApiKey;
use Rahasi\Contracts\ApiKeyRepositoryContract;
use Rahasi\DataTransfers\ApiKeysDataTranser;
use Rahasi\Exceptions\ApiKeyNotGeneratedException;
use Rahasi\Exceptions\InvalidEnvironmentException;
use Rahasi\Models\User;

/**
* API KEY REPOSITORY
*/
class ApiKeyRepository implements ApiKeyRepositoryContract
{
	protected $apiKey;
	protected $user;

	function __construct(ApiKey $apiKey,User $user)
	{
		$this->apiKey = $apiKey;
		$this->user = $user;
	}

	/**
	 * Generate Key per user
	 * @param  $user_id   User ID for this KEY
	 * @param  string $environment  Environment for the key
	 * @return array 
	 */
	public function generateKey($user_id,$environment = "test"){
			
		// Check if environment is valid it has to be test or live
		if (strtolower($environment) !=='test' && strtolower($environment)!=='live') {
			throw new InvalidEnvironmentException("Environment must be test or live", 1);
		}

		// Check if this user doesn't have an existing key
		// if he has it, then update it, otherwise try 
		// to generate a new key
		$apiKey = (new ApiKey)->where('user_id',$user_id)->where('environment',$environment)->first();

		if (is_null($apiKey)) {
			$apiKey = new  ApiKey;
		}

        $apiKey->key = $apiKey->generateKey();
        $apiKey->user_id = $user_id;
        $apiKey->level = 1;
        $apiKey->ignore_limits = 1;
        $apiKey->environment = $environment;

         if ($apiKey->save() === false) {
            throw new ApiKeyNotGeneratedException("Could not generate api key", 1);
        }

        return $apiKey;
	}

	/**
	 * Get key by user
	 * @param  $userid  owner of the keys
	 * @return array     
	 */
	public function getKeysByUser($userId){

		$apiKeys = new ApiKeysDataTranser();

		$keys = (new ApiKey)->where('user_id',$userId)->get();

		// Formatting keys
		foreach($keys as $key) {

			switch (strtolower($key->environment)) {
				case 'live':
					$apiKeys->setLiveKey($key->key);
					break;	
				case 'test':
					$apiKeys->setTestKey($key->key);
					break;				
				default:

					break;
			}

			// Don't forget to set user ID
			$apiKeys->setUserId($key->user_id);
		}

		return $apiKeys;
	}

	/**
     * @param $key
     * @return ApiKeyRepository
     */
    public function getByKey($key)
    {
        $apiKey = $this->apiKey->where('key', '=', $key)
            	  			   ->first();

        if (empty($apiKey) || $apiKey->exists == false) {
            return null;
        }

        // Attach user to this key
        $apiKey->user = $this->user->findOrFail($apiKey->id);
        
        return $apiKey;
    }

}
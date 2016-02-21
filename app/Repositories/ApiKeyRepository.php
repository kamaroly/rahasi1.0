<?php 
namespace Rahasi\Repositories;
use Chrisbjr\ApiGuard\Models\ApiKey;
use Rahasi\Contracts\ApiKeyRepositoryContract;
use Rahasi\Exceptions\ApiKeyNotGeneratedException;
use Rahasi\Exceptions\InvalidEnvironmentException;

/**
* API KEY REPOSITORY
*/
class ApiKeyRepository implements ApiKeyRepositoryContract
{

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

		$apiKeys = new \stdClass();

		$keys = (new ApiKey)->where('user_id',$userId)->get();

		// Formatting keys
		foreach($keys as $key) {

			switch (strtolower($key->environment)) {
				case 'live':
					$apiKeys->live = $key->key;
					break;	
				case 'test':
					$apiKeys->test = $key->key;
					break;				
				default:

					break;
			}
		}

		return $apiKeys;
	}
}
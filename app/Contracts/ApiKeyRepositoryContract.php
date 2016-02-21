<?php 
namespace Rahasi\Contracts;

interface ApiKeyRepositoryContract{

	/**
	 * Generate Key per user
	 * @param  $user_id   User ID for this KEY
	 * @param  string $environment  Environment for the key
	 * @return array 
	 */
	public function generateKey($user_id,$environment = "test");

	/**
	 * Get key by user
	 * @param  $userid  owner of the keys
	 * @return array     
	 */
	public function getKeysByUser($userid);


}
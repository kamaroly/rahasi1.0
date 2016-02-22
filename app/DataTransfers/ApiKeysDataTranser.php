<?php 
namespace Rahasi\DataTransfers;

/**
 * API keys datatransfer		
 */
class ApiKeysDataTranser
{
	/**
	 * Holds key for live environment
	 * @var string
	 */
	public $liveKey = null;

	/**
	 * Holds key for test environment
	 * @var string
	 */
    public $testKey = null;

    /**
     * Holds the id of the user to whom
     * this key belons to
     * @var int
     */
    public $user_id = null;



    /**
     * Gets the Holds key for live environment.
     *
     * @return string
     */
    public function getLiveKey()
    {
        return $this->liveKey;
    }

    /**
     * Sets the Holds key for live environment.
     *
     * @param string $liveKey the live key
     *
     * @return self
     */
    public function setLiveKey($liveKey)
    {
        $this->liveKey = $liveKey;

        return $this;
    }

    /**
     * Gets the Holds key for test environment.
     *
     * @return string
     */
    public function getTestKey()
    {
        return $this->testKey;
    }

    /**
     * Sets the Holds key for test environment.
     *
     * @param string $testKey the test key
     *
     * @return self
     */
    public function setTestKey($testKey)
    {
        $this->testKey = $testKey;

        return $this;
    }

    /**
     * Gets the Holds the id of the user to whom
this key belons to.
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Sets the Holds the id of the user to whom this key belons to.
     *
     * @param int $user_id the user id
     *
     * @return self
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }
}
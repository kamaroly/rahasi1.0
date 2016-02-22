<?php 
namespace Rahasi\Services;

use Exception;
/**
* Biller services
*/
class BillerService
{
	/**
	 * raw_response
	 * @var string
	 */
	public $raw_response;
	/**
	 * response_code
	 * @var string
	 */
	public $response_code;

	/**
	 * response_status
	 * @var string
	 */
	public $response_status;

	/**
	 * response_description
	 * @var string
	 */
	public $response_description;

	/**
	 * External transaction id
	 * @var string
	 */
	public $transactionId;

	/**
	 * Merchant hose
	 * @var string
	 */
	public $merchant_host;

	/**
	 * Procees bill payment
	 * @param  array  $data 
	 * @return self
	 */
	public function bill(array $data)
	{

		$this->setTransactionId($data['transactionid']);
		$this->setMerchantHost($data['merchant_host']);

		$this->merchant_host = '127.0.0.1';
		try
		{

			$this->raw_response = 'Test raw response string';
			$this->response_code = 200;
			$this->response_status = 'success';
			$this->response_description ='TV Payment went well, tx 12312391237121';
			
			return $this;
		}
		catch (Exception $ex){

			$this->raw_response = $ex->getMessage();
			$this->response_code = 500;
			$this->response_status = 'error';
			$this->response_description = $ex->getMessage();

			return $this;
		}
	}

    /**
     * Gets the raw_response.
     *
     * @return string
     */
    public function getRawResponse()
    {
        return $this->raw_response;
    }

    /**
     * Sets the raw_response.
     *
     * @param string $raw_response the raw response
     *
     * @return self
     */
    public function setRawResponse($raw_response)
    {
        $this->raw_response = $raw_response;

        return $this;
    }

    /**
     * Gets the response_code.
     *
     * @return string
     */
    public function getResponseCode()
    {
        return $this->response_code;
    }

    /**
     * Sets the response_code.
     *
     * @param string $response_code the response code
     *
     * @return self
     */
    public function setResponseCode($response_code)
    {
        $this->response_code = $response_code;

        return $this;
    }

    /**
     * Gets the response_status.
     *
     * @return string
     */
    public function getResponseStatus()
    {
        return $this->response_status;
    }

    /**
     * Sets the response_status.
     *
     * @param string $response_status the response status
     *
     * @return self
     */
    public function setResponseStatus($response_status)
    {
        $this->response_status = $response_status;

        return $this;
    }

    /**
     * Gets the response_description.
     *
     * @return string
     */
    public function getResponseDescription()
    {
        return $this->response_description;
    }

    /**
     * Sets the response_description.
     *
     * @param string $response_description the response description
     *
     * @return self
     */
    public function setResponseDescription($response_description)
    {
        $this->response_description = $response_description;

        return $this;
    }

    /**
     * Gets the External transaction id.
     *
     * @return string
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * Sets the External transaction id.
     *
     * @param string $transactionId the transaction id
     *
     * @return self
     */
    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;

        return $this;
    }

    /**
     * Gets the Merchant hose.
     *
     * @return string
     */
    public function getMerchantHost()
    {
        return $this->merchant_host;
    }

    /**
     * Sets the Merchant hose.
     *
     * @param string $merchant_host the merchant host
     *
     * @return self
     */
    public function setMerchantHost($merchant_host)
    {
        $this->merchant_host = $merchant_host;

        return $this;
    }
}
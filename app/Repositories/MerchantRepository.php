<?php 

namespace  Rahasi\Repositories;

use Illuminate\Events\Dispatcher;
use Rahasi\Exceptions\MerchantRegistrationFailedException;
use Rahasi\Exceptions\MerchantUpdateFailedException;
use Rahasi\Models\Merchant;


/**
* Merchant repository class
*/
class MerchantRepository
{
	
	function __construct(Merchant $merchant,Dispatcher $dispatcher)
	{
		$this->merchant = $merchant;
		$this->dispatcher = $dispatcher;
	}

	/**
	 * Get merchant by code
	 * @param  string $merchant_code
	 * @return Rahasi\Models\Merchant
	 */
	public function getByMerchantCode($merchant_code)
	{
		$merchant = $this->merchant->where('merchant_code',trim($merchant_code))->firstOrFail();
		return $merchant;
	}

	/**
	 * Stores new merchant in the database
	 * @param  array $data contains merchant details
	 * @return Rahasi\Models\Merchant object
	 */
	public function store($data)
	{

		$data['merchant_code'] = trim($data['merchant_code']);
		if (is_null($data['merchant_code']) || empty($data['merchant_code'])) {
			$data['merchant_code'] = time();
		}
		$merchant = $this->merchant->create($data);

		if ($merchant) {
            // Fire the 'merchant registered' event
            $this->dispatcher->fire('rahasi.merchant.registered', $merchant);
            return $merchant;
		}

		$this->dispatcher->fire('rahasi.merchant.registration.failed', $data);
	}

	/**
	 * Update existing merchant dtails
	 * @param  array $data merchant details
	 * @return Rahasi\Models\Merchant object
	 */
	public function update($data)
	{
		$merchant = $this->merchant->find($data['id']);	

		// Remove unwanted information
		unset($data['id']);
		
		$results = $merchant->update($data);

		if ($results) {
            // Fire the 'merchant registered' event
            $this->dispatcher->fire('rahasi.merchant.updated', $merchant);
            return $results;
		}

		$this->dispatcher->fire('rahasi.merchant.update.failed', $data);
		return $results;
	}


}
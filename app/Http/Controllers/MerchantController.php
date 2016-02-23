<?php

namespace Rahasi\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Rahasi\Http\Controllers\Controller;
use Rahasi\Http\Requests;
use Rahasi\Http\Requests\CreateMerchantRequest;
use Rahasi\Http\Requests\EditMerchantRequest;
use Rahasi\Repositories\MerchantRepository;
use Vinkla\Hashids\HashidsManager;

class MerchantController extends Controller
{
	function __construct(HashidsManager $hashids,MerchantRepository $merchantRepo)
	{
		$this->hashids = $hashids;
		$this->merchantRepo = $merchantRepo;
	}
	/**
	 * Store new merchant to database
	 * @param  CreateMerchantRequest $request   this validates inputs
	 * @param  string                $user_hash unique hash identifier for merchant
	 * @return redirect              
	 */
    public function store(CreateMerchantRequest $request,$hash)
    {
    	try {
    	 // Decode the hashid
        $data 	 = $request->all();
        $data['user_id'] = $this->hashids->decode($hash)[0];

        // Start registration process
        $this->merchantRepo->store($data);

	        return redirect()->route('sentinel.users.edit',['hash'=>$hash]);
    	}
        catch (MerchantRegistrationFailedException $e){
            Log::critical($e->getMessage());
            return redirect()->route('sentinel.users.edit',['hash'=> $user_hash]);
        }
        catch (Exception $e) {
    		Log::critical($e->getMessage());
	        return redirect()->route('sentinel.users.edit',['hash'=>$hash]);
    	}
    }

    /**
     * Update existing tansaction
     * @param  EditMerchantRequest $request 
     * @param  string             $hash
     * @return redirect
     */
	public function edit(EditMerchantRequest $request,$hash)
    {    
    	try {
             // Decode the hashid
            $data    = $request->all();
            $data['id'] = $this->hashids->decode($hash)[0];

            // Start registration process
            $this->merchantRepo->update($data);

            return redirect()->route('sentinel.users.edit',['hash'=> $request->get('user_hash')]);
        } 
        catch (MerchantUpdateFailedException $e){
            Log::critical($e->getMessage());
            return redirect()->route('sentinel.users.edit',['hash'=>  $request->get('user_hash')]);
        }
        catch (Exception $e) {
            Log::critical($e->getMessage());
            return redirect()->route('sentinel.users.edit',['hash'=>  $request->get('user_hash')]);
        }
    }    
}

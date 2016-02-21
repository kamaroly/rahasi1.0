<?php 
namespace App\Transformers;
use League\Fractal\TransformerAbstract;

/**
 * Bill payment transformer
 */
 class PayBillTransform extends TransformerAbstract
 {
 	
 	public function transform($bill)
	{
	  return  [
             'msisdn'=>'250726044221',
             'company_id'=>'ELECT',
             'reference'=>'04223731771',
             'amount'=>100,
             'api_key_id'=>'8aaf19d386b3277451fbfd2c8f3b3422d6346d69',
             ];
	}

 } ?>
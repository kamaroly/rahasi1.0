<?php 
namespace Rahasi\Transformers;
use League\Fractal\TransformerAbstract;

/**
 * Bill payment transformer
 */
 class PayBillTransformer extends TransformerAbstract
 {
 	
 	public function transform($bill)
	{
	  return  [
             'code'=>$bill->response_code,
             'status'=>$bill->status,
             'transactionid'=>$bill->external_transactionid,
             'description'=>$bill->response_description,
             'rahasi_reference'=>$bill->transactionid,
             ];
	}

 } 
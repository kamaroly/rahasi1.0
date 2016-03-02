 <div class="row">
 <h4>{{ trans('paybill.request') }}</h4>
 	 <?php dump($bill->raw_request_to_merchant); 	 ;?>
 </div>
  <div class="row">
 <h4>{{ trans('paybill.response') }}</h4>
 	 <?php dump($bill->raw_response_from_merchant); 	 ;?>
 </div>
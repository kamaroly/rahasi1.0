<h4 style="margin-left:20px;">{{ trans('paybill.details_information') }}</h4>
<hr>
<div class="col-sm-4 col-md-6">
  <div class="form-group">
    <label for="external_transactionid">{{ trans('general.external_transactionid') }}</label>
      <div class="form-control">
        {!! $bill->external_transactionid !!}
      </div>      
    </div>
</div>

<div class="col-sm-4 col-md-6">
  <div class="form-group">
    <label for="merchant_code">{{ trans('merchant.merchant_code') }}</label>
      <div class="form-control">
        {!! $bill->merchant_code !!}
      </div>  
    </div>
</div>

<div class="col-sm-4 col-md-6">
<div class="form-group">
<label>{{ trans('paybill.bill_description') }}</label>
      <div class="form-control">
        {!! $bill->description !!}
      </div>  
  </div>
</div>

<div class="col-sm-4 col-md-6">
<div class="form-group">
<label>{{ trans('paybill.reference_number') }}</label>
      <div class="form-control">
        {!! $bill->reference_number !!}
      </div>  
  </div>
</div>

<div class="col-sm-4 col-md-6">
<div class="form-group">
<label>{{ trans('paybill.amount') }}</label>
      <div class="form-control">
        {!! $bill->amount !!}
      </div>  
  </div>
</div>

<div class="col-sm-4 col-md-6">
<div class="form-group">
<label>{{ trans('general.response_code') }}</label>
      <div class="form-control">
        {!! $bill->response_code !!}
      </div>  
  </div>
</div>

<div class="col-sm-4 col-md-6">
<div class="form-group">
<label>{{ trans('general.response_description') }}</label>
      <div class="form-control">
        {!! $bill->response_description !!}
      </div>  
  </div>
</div>
<div class="col-sm-4 col-md-6">
<div class="form-group">
<label>{{ trans('general.merchant_host') }}</label>
      <div class="form-control">
        {!! $bill->merchant_host !!}
      </div>  
  </div>
</div>

<div class="col-sm-4 col-md-6">
<div class="form-group">
<label>{{ trans('general.ip_address') }}</label>
      <div class="form-control">
        {!! $bill->ip_address !!}
      </div>  
  </div>
</div>
<div class="col-sm-4 col-md-6">
<div class="form-group">
<label>{{ trans('general.merchant_host') }}</label>
      <div class="form-control">
        {!! $bill->updated_at !!}
      </div>  
  </div>
</div>
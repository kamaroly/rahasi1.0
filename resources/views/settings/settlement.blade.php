
<div class="col-sm-4 col-md-4">
<div class="form-group {!! $errors->has('merchant_code') ? 'has-error' : '' !!}">
    <label for="merchant_code" >{!! trans('merchant.merchant_code') !!}</label>
    <input class="form-control" placeholder="{!! trans('merchant.merchant_code') !!}" name="merchant_code" value="{!! $merchant->merchant_code !!}" id="merchant_code" type="text" {!! (Sentry::getUser()->hasAccess('admin') == false)?'readonly="disabled"':'' !!}>
    </div>
</div>
<div class="col-sm-4 col-md-4">
<div class="form-group {!! $errors->has('service_fees') ? 'has-error' : '' !!}">
    <label for="service_fees" >{!! trans('merchant.service_fees') !!}</label>
    <input class="form-control" placeholder="{!! trans('merchant.service_fees') !!}" name="service_fees" value="{!! $merchant->service_fees !!}" id="service_fees" type="text" {!! (Sentry::getUser()->hasAccess('admin') == false)?'readonly="readonly"':'' !!}>
    </div>
</div>
<div class="col-sm-4 col-md-4">
<div class="form-group {!! $errors->has('bank_account_number') ? 'has-error' : '' !!}">
    <label for="bank_account_number" >{!! trans('merchant.bank_account_number') !!}</label>
    <input class="form-control" placeholder="{!! trans('merchant.bank_account_number') !!}" name="bank_account_number" value="{!! $merchant->bank_account_number !!}" id="bank_account_number" type="text">
</div>
</div>
<div class="col-sm-4 col-md-4">
   <div class="form-group {!! $errors->has('bank_account_name') ? 'has-error' : '' !!}">
    <label for="bank_account_name" >{!! trans('merchant.bank_account_name') !!}</label>
    <input class="form-control" placeholder="{!! trans('merchant.bank_account_name') !!}" name="bank_account_name" value="{!! $merchant->bank_account_name !!}" id="bank_account_name" type="text">
</div>
</div>
<div class="col-sm-4 col-md-4">
<div class="form-group {!! $errors->has('bank_name') ? 'has-error' : '' !!}">
    <label for="bank_name" >{!! trans('merchant.bank_name') !!}</label>
    <input class="form-control" placeholder="{!! trans('merchant.bank_name') !!}" name="bank_name" value="{!! $merchant->bank_name !!}" id="bank_name" type="text">
</div>
</div>
<div class="col-sm-4 col-md-4">
  <div class="form-group {!! $errors->has('settlement_frequency') ? 'has-error' : '' !!}">
    <label for="settlement_frequency" >{!! trans('merchant.settlement_frequency') !!}</label>
    
     <select name="settlement_frequency" class="form-control">
         <option value="daily">
         </option>{!! trans('general.daily') !!}</option>
         <option value="weekly">{!! trans('general.weekly') !!}</option>
         <option value="monthly">{!! trans('general.monthly') !!}</option>
     </select>
</div>
</div>
<div class="col-sm-6 col-md-6">
<div class="form-group">
     <input name="_token" value="{{ csrf_token() }}" type="hidden">
   <input class="btn btn-primary" value="{{ trans('merchant.save_merchant') }}" type="submit">
</div>            
</div>

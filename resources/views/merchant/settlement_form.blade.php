<div class="row" style="color: red;">
{!! $errors->has('merchant_code') ? '<small>'.$errors->first('merchant_code').'</small>' : '' !!}
{!! $errors->has('service_fees') ? '<small>'.$errors->first('service_fees').'</small>' : '' !!}
{!! $errors->has('bank_account_number') ? '<small>'.$errors->first('bank_account_number').'</small>' : '' !!}
{!! $errors->has('bank_account_name') ? '<small>'.$errors->first('bank_account_name').'</small>' : '' !!}
{!! $errors->has('bank_name') ? '<small>'.$errors->first('bank_name').'</small>' : '' !!}
{!! $errors->has('settlement_frequency') ? '<small>'.$errors->first('settlement_frequency').'</small>' : '' !!}
</div>

<div class="form-group {!! $errors->has('merchant_code') ? 'has-error' : '' !!}">
    <label for="merchant_code" class="sr-only">{!! trans('merchant.merchant_code') !!}</label>
    <input class="form-control" placeholder="{!! trans('merchant.merchant_code') !!}" name="merchant_code" value="{!! $merchant->merchant_code !!}" id="merchant_code" type="text" {!! (Sentry::getUser()->hasAccess('admin') == false)?'readonly="disabled"':'' !!}>
</div>
<div class="form-group {!! $errors->has('service_fees') ? 'has-error' : '' !!}">
    <label for="service_fees" class="sr-only">{!! trans('merchant.service_fees') !!}</label>
    <input class="form-control" placeholder="{!! trans('merchant.service_fees') !!}" name="service_fees" value="{!! $merchant->service_fees !!}" id="service_fees" type="text" {!! (Sentry::getUser()->hasAccess('admin') == false)?'readonly="readonly"':'' !!}>
</div>
<div class="form-group {!! $errors->has('bank_account_number') ? 'has-error' : '' !!}">
    <label for="bank_account_number" class="sr-only">{!! trans('merchant.bank_account_number') !!}</label>
    <input class="form-control" placeholder="{!! trans('merchant.bank_account_number') !!}" name="bank_account_number" value="{!! $merchant->bank_account_number !!}" id="bank_account_number" type="text">
</div>
   <div class="form-group {!! $errors->has('bank_account_name') ? 'has-error' : '' !!}">
    <label for="bank_account_name" class="sr-only">{!! trans('merchant.bank_account_name') !!}</label>
    <input class="form-control" placeholder="{!! trans('merchant.bank_account_name') !!}" name="bank_account_name" value="{!! $merchant->bank_account_name !!}" id="bank_account_name" type="text">
</div>
<div class="form-group {!! $errors->has('bank_name') ? 'has-error' : '' !!}">
    <label for="bank_name" class="sr-only">{!! trans('merchant.bank_name') !!}</label>
    <input class="form-control" placeholder="{!! trans('merchant.bank_name') !!}" name="bank_name" value="{!! $merchant->bank_name !!}" id="bank_name" type="text">
</div>
  <div class="form-group {!! $errors->has('settlement_frequency') ? 'has-error' : '' !!}">
    <label for="settlement_frequency" class="sr-only">{!! trans('merchant.settlement_frequency') !!}</label>
    
     <select name="settlement_frequency" class="form-control">
         <option value="daily">{!! trans('general.daily') !!}</option>
         <option value="weekly">{!! trans('general.weekly') !!}</option>
         <option value="monthly">{!! trans('general.monthly') !!}</option>
     </select>
</div>

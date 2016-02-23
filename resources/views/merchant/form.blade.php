<div class="row">
    <h4>{{ trans('merchant.merchant_details') }}</h4>
    <div class="well" style="background: #ccc!important; ">
        <form method="POST" action="POST" accept-charset="UTF-8" class="form-inline" role="form">
            <div class="row well">
                <div class="form-group {{ $errors->has('names') ? 'has-error' : '' }}">
                <label for="names" class="sr-only">{{ trans('merchant.names') }}</label>
                <input class="form-control" placeholder="names" name="names" value="" id="names" type="text">
            </div>
            <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                <label for="address" class="sr-only">{{ trans('merchant.address') }}</label>
                <input class="form-control" placeholder="address" name="address" value="" id="address" type="text">
            </div>

                <div class="form-group {{ $errors->has('contact_person_names') ? 'has-error' : '' }}">
                <label for="contact_person_names" class="sr-only">{{ trans('merchant.contact_person_names') }}</label>
                <input class="form-control" placeholder="contact_person_names" name="contact_person_names" value="" id="contact_person_names" type="text">
            </div>
        <div class="form-group {{ $errors->has('contact_person_phone_number') ? 'has-error' : '' }}">
                <label for="contact_person_phone_number" class="sr-only">{{ trans('merchant.contact_person_phone_number') }}</label>
                <input class="form-control" placeholder="contact_person_phone_number" name="contact_person_phone_number" value="" id="contact_person_phone_number" type="text">
            </div>
        <div class="form-group {{ $errors->has('contact_person_email') ? 'has-error' : '' }}">
                <label for="contact_person_email" class="sr-only">{{ trans('merchant.contact_person_email') }}</label>
                <input class="form-control" placeholder="contact_person_email" name="contact_person_email" value="" id="contact_person_email" type="text">
            </div>
            </div>

           <div class="row well">
                    <div class="form-group {{ $errors->has('merchant_code') ? 'has-error' : '' }}">
                    <label for="merchant_code" class="sr-only">{{ trans('merchant.merchant_code') }}</label>
                    <input class="form-control" placeholder="merchant_code" name="merchant_code" value="" id="merchant_code" type="text">
                </div>
                <div class="form-group {{ $errors->has('service_fees') ? 'has-error' : '' }}">
                    <label for="service_fees" class="sr-only">{{ trans('merchant.service_fees') }}</label>
                    <input class="form-control" placeholder="service_fees" name="service_fees" value="" id="service_fees" type="text">
                </div>
                <div class="form-group {{ $errors->has('bank_account_number') ? 'has-error' : '' }}">
                    <label for="bank_account_number" class="sr-only">{{ trans('merchant.bank_account_number') }}</label>
                    <input class="form-control" placeholder="bank_account_number" name="bank_account_number" value="" id="bank_account_number" type="text">
                </div>
                   <div class="form-group {{ $errors->has('bank_account_name') ? 'has-error' : '' }}">
                    <label for="bank_account_name" class="sr-only">{{ trans('merchant.bank_account_name') }}</label>
                    <input class="form-control" placeholder="bank_account_name" name="bank_account_name" value="" id="bank_account_name" type="text">
                </div>
                <div class="form-group {{ $errors->has('bank_name') ? 'has-error' : '' }}">
                    <label for="bank_name" class="sr-only">{{ trans('merchant.bank_name') }}</label>
                    <input class="form-control" placeholder="bank_name" name="bank_name" value="" id="bank_name" type="text">
                </div>
                  <div class="form-group {{ $errors->has('settlement_frequency') ? 'has-error' : '' }}">
                    <label for="settlement_frequency" class="sr-only">{{ trans('merchant.settlement_frequency') }}</label>
                    
                     <select name="settlement_frequency" class="form-control">
                         <option value="daily">{{ trans('general.daily') }}</option>
                         <option value="weekly">{{ trans('general.weekly') }}</option>
                         <option value="monthly">{{ trans('general.monthly') }}</option>
                     </select>
                </div>
            </div>


            <input name="_token" value="{{ csrf_token() }}" type="hidden">
            <input class="btn btn-primary" value="{{ trans('merchant.save_merchant') }}" type="submit">

        </form>

    </div>
</div>
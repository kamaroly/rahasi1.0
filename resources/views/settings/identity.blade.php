<div class="col-sm-12 col-md-12" >
<div class="row" style="color:red">
{!! $errors->has('names') ? '<small class="has-error">'.$errors->first('names').'</small>' : '' !!}
{!! $errors->has('address') ? '<small class="has-error">'.$errors->first('address').'</small>' : '' !!}
{!! $errors->has('contact_person_names') ? '<small class="has-error">'.$errors->first('contact_person_names').'</small>' : '' !!}
{!! $errors->has('contact_person_phone_number') ? '<small class="has-error">'.$errors->first('contact_person_phone_number').'</small>' : '' !!}
{!! $errors->has('contact_person_email') ? '<small class="has-error">'.$errors->first('contact_person_email').'</small>' : '' !!}
</div>

<div class="col-sm-4 col-md-4">
  <div class="form-group {!! $errors->has('names') ? 'has-error' : '' !!}">
    <label for="names" >{!! trans('merchant.names') !!}</label>
    <input class="form-control" placeholder="{{ trans('merchant.names') }}" name="names" value="{!! $merchant->names !!}" id="names" type="text">
    </div>
    </div>
    <div class="col-sm-4 col-md-4">
    <div class="form-group {!! $errors->has('address') ? 'has-error' : '' !!}">
    <label for="address" >{!! trans('merchant.address') !!}</label>
        <input class="form-control" placeholder="{{ trans('merchant.address') }}" name="address" value="{!! $merchant->address !!}" id="address" type="text">
    </div>
    </div>

<div class="col-sm-4 col-md-4">
    <div class="form-group {!! $errors->has('contact_person_names') ? 'has-error' : '' !!}">
    <label for="contact_person_names" >{!! trans('merchant.contact_person_names') !!}</label>
    <input class="form-control" placeholder="{{ trans('merchant.contact_person_names') }}" name="contact_person_names" value="{!! $merchant->contact_person_names !!}" id="contact_person_names" type="text">
    </div>
    </div>
    <div class="col-sm-4 col-md-4">
<div class="form-group {!! $errors->has('contact_person_phone_number') ? 'has-error' : '' !!}">
    <label for="contact_person_phone_number" >{!! trans('merchant.contact_person_phone_number') !!}</label>

    <input class="form-control" placeholder="{{ trans('merchant.contact_person_phone_number') }}" name="contact_person_phone_number" value="{!! $merchant->contact_person_phone_number !!}" id="contact_person_phone_number" type="text">
    </div>
    </div>
    <div class="col-sm-4 col-md-4">
<div class="form-group {!! $errors->has('contact_person_email') ? 'has-error' : '' !!}">
    <label for="contact_person_email" >{!! trans('merchant.contact_person_email') !!}</label>
    <input class="form-control" placeholder="{{ trans('merchant.contact_person_email') }}" name="contact_person_email" value="{!! $merchant->contact_person_email !!}" id="contact_person_email" type="text">
</div>            
</div>
<div class="col-sm-6 col-md-6">
<div class="form-group">
     <input name="_token" value="{{ csrf_token() }}" type="hidden">
   <input class="btn btn-primary" value="{{ trans('merchant.save_merchant') }}" type="submit">
</div>            
</div>
  <div class="row">
     
  </div>
</div>
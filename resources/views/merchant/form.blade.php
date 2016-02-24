<?php $merchant = Rahasi\Models\User::find($user->id)->merchant; ?>
<?php $route = route('merchants.store',['hash'=>$user->hash]);?>
<!-- if merchant is null create a new merchant object -->
@if (!is_null($merchant))
   <?php $route = route('merchants.edit',['hash'=>$merchant->hash]);?>
@else
  <?php $merchant = new Rahasi\Models\Merchant; ?>
@endif

<form method="POST" action="{!! $route !!}" accept-charset="UTF-8" class="form-inline">

<!-- We have merchant this is only for updating -->
@if ($merchant->exists)
    {{-- add put method --}}
    <input name="_method" value="PUT" type="hidden">
    <input name="user_hash" value="{!! $user->hash !!}" type="hidden">
@endif

<div class="row">
    <h4>{{ trans('merchant.merchant_details') }}</h4>
    <div class="well" style="background: #ccc!important; ">
        <div class="row">
          <strong>{{ trans('merchant.identity') }}</strong>
           <div class="well">
                @include('merchant.identity_form')
           </div>
        </div>

       <div class="row">
            <strong>{{ trans('merchant.settlement_details') }}</strong>
            <div class="well">
               @include('merchant.settlement_form')
            </div>
       </div>
        
        <div class="row ">
            <strong>{{ trans('merchant.api_details') }}</strong>
            <div class="well">
               @include('merchant.api_form')
            </div>

        <input name="_token" value="{{ csrf_token() }}" type="hidden">
        <input class="btn btn-primary pull-right" value="{{ trans('merchant.save_merchant') }}" type="submit">
       </div>
    </div>
</div>
</form>
@extends(config('sentinel.layout'))
{{-- Web site Title --}}
@section('title')
    @parent
    {{ trans('navigation.settings') }}
@stop
{{-- Content --}}
@section('content')
<?php $user = Rahasi\Models\User::find(Sentry::getUser()->id); ?>
<?php $merchant = Rahasi\Models\User::find($user->id)->merchant; ?>
<?php $route = route('merchants.store',['hash'=>  $user->hash]);?>

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

<ul class="tabs">

    <li>
        <input type="radio" name="tabs" id="tab1" {!! (Request::is('settings') ? 'checked' : '') !!} />
        <label for="tab1">{{ trans('settings.identity') }}</label>
        <div id="tab-content1" class="tab-content">
          @include('settings.identity')
        </div>
    </li>
    <li>
        <input type="radio" name="tabs" id="tab2" {!! (Request::is('settings#settlement*') ? 'checked' : '') !!} />
        <label for="tab2">  {{ trans('settings.settlement_details') }}</label>
        <div id="tab-content2" class="tab-content">
          @include('settings.settlement')
        </div>
    </li>
    <li>
        <input type="radio" name="tabs" id="tab3" {!! (Request::is('settings#merchant_apis*') ? 'checked' : '') !!} />
        <label for="tab3">{{ trans('settings.merchant_apis') }}</label>
        <div id="tab-content3" class="tab-content">
          @include('settings.merchant_apis')
        </div>
    </li>
</form>

    <li>
        <input type="radio" name="tabs" id="tab4" {!! (Request::is('settings/keys*') ? 'checked' : '') !!} />
        <label for="tab4">{{ trans('settings.keys') }}</label>
        <div id="tab-content4" class="tab-content">
          <p>
              @include('settings.apikeys')
          </p>
        </div>
    </li>
</ul>
@endsection
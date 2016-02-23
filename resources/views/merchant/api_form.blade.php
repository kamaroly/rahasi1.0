<div class="row" style="color: red;">
{!! $errors->has('test_url') ? '<small>'.$errors->first('test_url').'</small>' : '' !!}
{!! $errors->has('test_key') ? '<small>'.$errors->first('test_key').'</small>' : '' !!}
{!! $errors->has('live_url') ? '<small>'.$errors->first('live_url').'</small>' : '' !!}
{!! $errors->has('live_key') ? '<small>'.$errors->first('live_key').'</small>' : '' !!}
</div>
<!-- Testing section -->
<div class="form-group {!! $errors->has('test_url') ? 'has-error' : '' !!}">
<label for="test_url" class="sr-only">{!! trans('merchant.test_url') !!}</label>
<input class="form-control" placeholder="{{ trans('merchant.test_url') }}" name="test_url" value="{!! $merchant->test_url !!}" id="test_url" type="text">
</div>

<div class="form-group {!! $errors->has('test_key') ? 'has-error' : '' !!}">
<label for="test_key" class="sr-only">{!! trans('merchant.test_key') !!}</label>
<input class="form-control" placeholder="{{ trans('merchant.test_key') }}" name="test_key" value="{!! $merchant->test_key !!}" id="test_key" type="text">
</div>

<!-- Testing section -->
<div class="form-group {!! $errors->has('live_url') ? 'has-error' : '' !!}">
<label for="live_url" class="sr-only">{!! trans('merchant.live_url') !!}</label>
<input class="form-control" placeholder="{{ trans('merchant.live_url') }}" name="live_url" value="{!! $merchant->live_url !!}" id="live_url" type="text">
</div>

<div class="form-group {!! $errors->has('live_key') ? 'has-error' : '' !!}">
<label for="live_key" class="sr-only">{!! trans('merchant.live_key') !!}</label>
<input class="form-control" placeholder="{{ trans('merchant.live_key') }}" name="live_key" value="{!! $merchant->live_key !!}" id="live_key" type="text">
</div>
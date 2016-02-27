@extends(config('sentinel.layout'))
{{-- Web site Title --}}
@section('title')
    @parent
    {{ trans('navigation.settings') }}
@stop
{{-- Content --}}
@section('content')
<ul class="tabs">
    <li>
        <input type="radio" name="tabs" id="tab1" {!! (Request::is('settings') ? 'checked' : '') !!} />
        <label for="tab1">{{ trans('settings.webhooks') }}</label>
        <div id="tab-content1" class="tab-content">
          <p>
              @include('settings.bank_details')
          </p>
        </div>
    </li>
    <li>
        <input type="radio" name="tabs" id="tab2" {!! (Request::is('settings/keys*') ? 'checked' : '') !!} />
        <label for="tab2">{{ trans('api.keys') }}</label>
        <div id="tab-content2" class="tab-content">
          <p>
              @include('settings.apikeys')
          </p>
        </div>
    </li>
</ul>
@endsection
<table class="table">
    <tr>
        <td>{{ trans('settings.test_key') }}</td>
        <td>{!! $apikeys->testKey !!}</td>
        <td>
        <a href="{{ route('settings.keys.generate',['environment'=>'test','userid'=>\Sentry::getUser()->hash]) }}" 
        class="btn btn-info">
            <i class="fa fa-refresh"></i>
        </a>
    </td>
    </tr>
    <tr>
        <td>{{ trans('settings.live_key') }}</td>
        <td>{!! $apikeys->liveKey !!}</td>
         <td>
         <a href="{{ route('settings.keys.generate',['environment'=>'live','userid'=>\Sentry::getUser()->hash]) }}"
             class="btn btn-info">
            <i class="fa fa-refresh"></i>
        </a></td>
    </tr>
</table>
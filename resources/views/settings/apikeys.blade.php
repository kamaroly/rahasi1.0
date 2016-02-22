@extends(config('sentinel.layout'))

{{-- Web site Title --}}
@section('title')
    @parent
    Users
@stop

{{-- Content --}}
@section('content')
<table class="table">
    <tr>
        <td>{{ trans('settings.test_key') }}</td>
        <td>{!! $apikeys->testKey !!}</td>
        <td><a href="{{ route('settings.keys.generate',['environment'=>'test','userid'=>$apikeys->user_id]) }}" class="btn btn-info">refresh</a></td>
    </tr>
    <tr>
        <td>{{ trans('settings.live_key') }}</td>
        <td>{!! $apikeys->liveKey !!}</td>
         <td><a href="{{ route('settings.keys.generate',['environment'=>'live','userid'=>$apikeys->user_id]) }}" class="btn btn-info">refresh</a></td>
    </tr>
</table>

@stop   
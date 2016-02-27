@extends('layouts.default')
@section('title')
	{{ trans('navigation.dashboard') }}
@endsection

@section('content')
<div class="col-md-4" style="padding-left:0px;">
    @include('dashboard.statistics')
</div>

<div class="col-md-8">
    @include('dashboard.weekly_statistics')
</div>
@endsection
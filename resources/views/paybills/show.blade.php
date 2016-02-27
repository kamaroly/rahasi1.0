@extends('layouts.default')

@section('title')
<a href="{!! url()->previous() !!}">
  <i class="icon-arrow-left-3"></i>
  {{ trans('paybill.details') }}
</a>
@endsection

@section('content')
<div class="row">
<div class="search_box col-sm-12 col-md-5">
  <?php //dd($bill); ?>
   @include('paybills.details')
</div>

<div class="col-sm-12 col-md-7">
   @include('paybills.raw_information')
</div>
</div>

@endsection
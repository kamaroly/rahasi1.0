@extends('layouts.docs')
@section('content')
<div class="docs-wrapper docs container">
	<section class="sidebar">
  @include('docs.menu')
	</section>

	<article >
  
  @include('docs.introduction')
  @include('docs.authentication')
  @include('docs.errors')
  @include('docs.request_ids')

  <!-- Methods -->
  @include('docs.methods.bills.bill-payment')
  @include('docs.methods.bills.get-payment-details')

 <!-- Merchant interfaces -->
  @include('docs.methods.bills.merchant-bill-payment')
  @include('docs.methods.bills.merchant-get-bill-details')
</article>
</div>
@endsection

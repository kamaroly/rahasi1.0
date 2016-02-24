@extends(config('sentinel.layout'))

{{-- Web site Title --}}
@section('title')
@parent
 {!! trans('paybill.payments') !!}
@stop

{{-- Content --}}
@section('content')
<div class="row">
    <div class="col-md-11">
            <h2>{{ trans('paybill.bills_transactions') }}</h2>
            {!! $bills->render() !!}
             <table class="table table-bordered">
                 <thead>
                     <tr>
                         <th>#</th>
                         <th>{{ trans('paybill.reference_number') }}</th>
                         <th>{{ trans('paybill.bill_description') }}</th>
                         <th>{{ trans('paybill.amount') }}</th>
                         <th>{{ trans('paybill.status') }}</th>
                         <th>{{ trans('paybill.response_description') }}</th>
                         <th>{{ trans('paybill.date_time') }}</th>
                         <th></th>
                     </tr>
                 </thead>
                 <tbody>
                    @each ('paybills.bill_item', $bills, 'bill', 'general.empty')
                 </tbody>
             </table>
    </div>
</div>

@stop
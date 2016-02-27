<tr>
	<td>{!! $bill->id !!}</td>
	<td>{!! $bill->reference_number !!}</td>
	<td>{!! $bill->description !!}</td>
	<td>{!! $bill->amount !!}</td>
	<td>{!! 'client' !!}</td>
	<td>{!! 'status.. success' !!}</td>
	<td>{!! $bill->response_description !!}</td>
	<td>{!! $bill->updated_at !!}</td>
	<td><a href="{{ route('bills.show',['hash'=>$bill->hash]) }}" class="btn btn-info">{{ trans('general.view') }}</a></td>
</tr>
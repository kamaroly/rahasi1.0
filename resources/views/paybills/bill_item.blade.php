<tr>
	<td>{!! $bill->id !!}</td>
	<td>{!! $bill->reference_number !!}</td>
	<td>{!! $bill->description !!}</td>
	<td>{!! $bill->amount !!}</td>
	<td>{!! 'status.. success' !!}</td>
	<td>{!! $bill->response_description !!}</td>
	<td>{!! $bill->updated_at !!}</td>
	<td><button class="btn btn-info">{{ trans('general.view') }}</button></td>
</tr>
﻿<p><a name="get-payment-details"></a></p>
<h2>Get Payment Details</h2>
<p>
 Whether you would like to check on the payment details after you have called the bill payment method, or the network has timed out before you get the response from Rahasi, you may wish to check the transaction status before you issue a new request, You will need to call this method to get the transaction details. 
 If the API you are calling is in test mode, Rahasi will give you information done in the test environment, though everything else will occur as if in live mode. 
 Rahasi will give you information based on the key environment you are using.
</p>
<p>
<b>URL : </b>  {{ route('api.v1.bills.get',['transactionid' => ':transactionid']) }}  <br />
<b>HTTP Method :</b> get <br />

<h3>ARGUMENTS</h3>

<section class="bs-ContentSection--compact table">
          <table class="bs-PropertyList bs-ContentSection-content--custom table-container">
            <tbody>
             <tr>
                <th class="bs-PropertyList-property table-row-property">transactionid</th>
                <td class="bs-PropertyList-definition table-row-definition">Unique external transaction id, you passed in the request while initiating a bill payment request</td>
    
              </tr>
            </tbody>
          </table>
        </section>
</p>
<p>
<h3>SAMPLE REQUEST</h3>
<p>You will need to submit below sample request after replacing its values by yours, then submit it as a json string.</p>
<pre class="line-numbers">
<code class="language-bash">
  curl http://rahasi.app/api/v1/bills/get/1341412312312
</code>
</pre>
<h3>SAMPLE SUCCESSFULL RESPONSE</h3>
<pre class="line-numbers">
<code class="language-javascript">
{
  "data": {
    "code": "200",
    "status": "OK",
    "transactionid": "1341412312312",
    "description": "CASHPOWER V#3288 2423 0162 14771401REF#2201/37428187 M# 045366557845 kWh13.90.",
    "payment_reference": "14569182700d34b026f67921d7cdca9bd7e6649d"
  }
}
</code>
</pre>

<h3>SAMPLE ERROR RESPONSE</h3>
<pre class="line-numbers">
<code class="language-javascript">
{
  "error": {
    "code": "GEN-NOT-FOUND",
    "http_code": 404,
    "message": "Resource Not Found"
  }
} 
</code>
</pre>
</p>

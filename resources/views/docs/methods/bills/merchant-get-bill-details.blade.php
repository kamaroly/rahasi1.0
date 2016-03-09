<p><a name="merchant-get-bill-details"></a></p>
<h1>Get bills Details</h1>
<p>
 Due to different unavoidable reasons, Rahasi may send a payment request and not get the response, in this case we put this transaction in doubt mode
 since we really don't know what happened to this transaction and we cannot confirm whether it was successfully or failed. Therefore
 Rahasi will attempt multiple time to call merchant APIs(Let call it get transaction details) by passing the transactionid issued in the request then 
 Rahasi will expect Merchant platform to respond with what happened to the transaction. 
 
 <h3>EXPECTED RESPONSES STATUS</h3>
<section class="bs-ContentSection--compact table">
    <table class="bs-PropertyList bs-ContentSection-content--custom table-container">
     <tbody>
      <tr>
        <th class="bs-PropertyList-property table-row-property" style="color:#00FF00">OK</th>
        <td class="bs-PropertyList-definition table-row-definition">This confirms that the transaction has been successfully processed</td>
      </tr>
      <tr>
        <th class="bs-PropertyList-property table-row-property" style="color:#FF0000" >FAILED</th>
        <td class="bs-PropertyList-definition table-row-definition">Transaction has been submited but it has failed at merchant level due to different reasons.</td>
      </tr>
      <tr>
        <th class="bs-PropertyList-property table-row-property" style="color:#f4645f">NOT-FOUND</th>
        <td class="bs-PropertyList-definition table-row-definition">Merchant cannot find the provided transactionid, this happens in most cases when transaction timedout before it reaches merchant. In this case Rahasi will attempt to initiate the request.</td>
      </tr>
     </tbody>
     </table>
    </section>
</p>
<p>
<b>URL : https://merchantapiurl.tld/getbilldetails/:transactionid  <br />
<b>HTTP Method :</b> get <br />

<h3>ARGUMENTS</h3>
<section class="bs-ContentSection--compact table">
          <table class="bs-PropertyList bs-ContentSection-content--custom table-container">
            <tbody>
             <tr>
                <th class="bs-PropertyList-property table-row-property">transactionid</th>
                <td class="bs-PropertyList-definition table-row-definition">Unique  transaction id, Rahasi passed in the request while initiating a bill payment request to a merchant</td>
              </tr>
            </tbody>
          </table>
        </section>
</p>
<p>
<h3>SAMPLE REQUEST</h3>
<p>Rahasi will need to submit below similar sample request, then it will expect merchant to respond with below response format.</p>
<div class='window-content'>
<div class="dark-code">
<pre>
<code class="language-bash">
  curl http://rahasi.app/api/v1/bills/get/1456919152396a16eb0e032af5749d104527f76b 
  -u test_merchant_api_key
 </code>
</pre>
</div>
</div>
<h3>EXPECTED SUCCESSFULL RESPONSE</h3>
<pre class="line-numbers">
<code class="language-javascript">
{
  "code": "200",
  "status": "OK",
  "account_balance" : 5000,
  "customer":"250722332214",
  "reference_number":"99882727737-23",
  "description": "CASHPOWER V#3288 2423 0162 14771401REF#2201/37428187 M# 045366557845 kWh13.90.",
  "payment_reference": "14569182700d34b026f67921d7cdca9bd7e6649d",
  "transactionid":"1456919152396a16eb0e032af5749d104527f76b"
  }
</code>
</pre>

<h3>SAMPLE ERROR RESPONSE</h3>
<pre class="line-numbers">
<code class="language-javascript">
{
  "error": {
    "code": "404",
    "status": "NOT-FOUND",
    "message": "Resource Not Found"
  }
} 
</code>
</pre>
</p>

<p><a name="merchant-bill-payment"></a></p>
<h1>Merchant bill payment.</h1>
<p>
 If you are a merchant and you would like to receive payment through Rahasi, you will need to have an api interface that Rahasi platform can understand. whenever Rahasi receives a payment request, it shall fire a webhook to your API with below defined information in the parameters, then your application has to treat the request and give rahasi response with the format defined in the <strong>expected sample request</strong> section.
</p>
<p>
  Based on the response from merchant application, Rahasi will decide whether is should allow the payment or not.

</p>
<p>
<b>URL : </b> It is defined in the <strong>settings > merchant information </strong>  tab. <br />
<b>HTTP Method :</b> POST <br />
<p>
<h3>SAMPLE REQUEST</h3>
<p>You will need to submit below sample request after replacing its values by yours, then submit it as a json string.</p>
<pre class="line-numbers">
<code class="language-javascript">
{
  "transactionid":"1456919152396a16eb0e032af5749d104527f76b",
  "description":"paying for electricity",
  "reference_number":"99882727737-23",
  "customer":"250722332214",
  "amount":100,
  "payment_method":"TIGOCASH"
  }
</code>
</pre>
<h3>EXPECTED SAMPLE SUCCESSFULL RESPONSE</h3>
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
</p>
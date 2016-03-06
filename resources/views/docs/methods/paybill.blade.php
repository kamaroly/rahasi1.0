<p><a name="pay-bill"></a></p>
<h1>Pay a bill</h1>
<p>
 To pay bill to a merchant on behalf of the customer, You will need to call this method. 
 If the API you are calling is in test mode, the supplied payment details won't actually affect wallets, though everything else will occur as if in live mode. 
 Rahasi will assume that the pay bill would have been done and it shall give you the proper response.
</p>
<p>
<b>URL : </b>  {{ route('api.v1.bills.pay') }}  <br />
<b>HTTP Method :</b> POST <br />

<h3>ARGUMENTS</h3>
<small>
<strong>Note:</strong> Order of the parameters is not necessary, you may arrange them the way you wish, this won't affect the method call.</small>
<section class="bs-ContentSection--compact table">
          <table class="bs-PropertyList bs-ContentSection-content--custom table-container">
            <tbody>
             <tr>
                <th class="bs-PropertyList-property table-row-property">transactionid</th>
                <td class="bs-PropertyList-definition table-row-definition">Unique external transaction id from financial institution</td>
              </tr>
               <tr>
                <th class="bs-PropertyList-property table-row-property">merchant_code</th>
                <td class="bs-PropertyList-definition table-row-definition">A code that identifies a merchant.</td>
              </tr>
              <tr>
                <th class="bs-PropertyList-property table-row-property">reference_number</th>
                <td class="bs-PropertyList-definition table-row-definition">A bill ID for this payment, for example if you are paying for the TV subscription this will be decoder number.</td>
              </tr>
              <tr>
                <th class="bs-PropertyList-property table-row-property">msisdn</th>
                <td class="bs-PropertyList-definition table-row-definition">The customer phone number to be credited.(e.g : 250721100818)</td>
              </tr>
              <tr>
                <th class="bs-PropertyList-property table-row-property">amount</th>
                <td class="bs-PropertyList-definition table-row-definition">Amount in Rwf to pay for customer's bill.(e.g: 5000 )</td>
              </tr>
              <tr>
                <th class="bs-PropertyList-property table-row-property">description</th>
                <td class="bs-PropertyList-definition table-row-definition">The reason why you are doing this transaction is words.</td>
              </tr>
            </tbody>
          </table>
        </section>
</p>
<p>
<h3>SAMPLE REQUEST</h3>
<p>You will need to submit below sample request after replacing its values by yours, then submit it as a json string.</p>
<pre class="line-numbers">
<code class="language-javascript">
{
  "transactionid":"bdflajsl333jdfsdf",
  "merchant_code":"1456916123",
  "description":"paying for the tv",
  "reference_number":"99882727737",
  "msisdn":"25072278238",
  "amount": 100
}
</code>
</pre>
<h3>SAMPLE SUCCESSFULL RESPONSE</h3>
<pre class="line-numbers">
<code class="language-javascript">
{
  "code":200,
  "status":"OK",
  "description":"CASHPOWER V#3288 2423 0162 14771401REF#2201/37428187 M# 045366557845 kWh13.90.",
  "transactionid":"145691641648b39c94c32a06982638e533c2481a"
}
</code>
</pre>

<h3>SAMPLE ERROR RESPONSE</h3>
<pre class="line-numbers">
<code class="language-javascript">
{
  "error": {
              "code": "GEN-WRONG-ARGS",
              "http_code": 400,
              "message": "Transaction id(bdflajsl333jdfsdf) has been used by you before, please correct this and try again"
            }
}   
</code>
</pre>
</p>
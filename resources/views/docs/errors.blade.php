<p><a name="errors"></a></p>
<h1>Errors</h1>
<p>
Nano credit uses conventional HTTP response codes to indicate the success or failure of an API request.
In general, codes in the 2xx range indicate success, codes in the 4xx range indicate an error that failed given 
the information provided (e.g., a required parameter was omitted, a charge failed, etc.), 
and codes in the 5xx range indicate an error with Rahasi's servers (these are rare).
</p>
<p>
   Not all errors map cleanly onto HTTP response codes, however.
   When a request is valid but does not complete successfully (e.g., a card is declined), we return a 402 error code.
</p>
<p>
<h3>HTTP status code summary</h3>
<section class="bs-ContentSection--compact table">
          <table class="bs-PropertyList bs-ContentSection-content--custom table-container">
            <tbody>
              <tr>
                <th class="bs-PropertyList-property table-row-property">200 - OK</th>
                <td class="bs-PropertyList-definition table-row-definition">Everything worked as expected.</td>
              </tr>
              <tr>
                <th class="bs-PropertyList-property table-row-property">400 - Bad Request</th>
                <td class="bs-PropertyList-definition table-row-definition">The request was unacceptable, often due to  missing a required parameter.</td>
              </tr>
              <tr>
                <th class="bs-PropertyList-property table-row-property">401 - Unauthorized</th>
                <td class="bs-PropertyList-definition table-row-definition">No valid API key provided.</td>
              </tr>
              <tr>
                <th class="bs-PropertyList-property table-row-property">402 - Request Failed</th>
                <td class="bs-PropertyList-definition table-row-definition">The parameters were valid but the request failed.</td>
              </tr>
              <tr>
                <th class="bs-PropertyList-property table-row-property">404 - Not Found</th>
                <td class="bs-PropertyList-definition table-row-definition">The requested resource doesn't exist.</td>
              </tr>
              <tr>
                <th class="bs-PropertyList-property table-row-property">429 - Too Many Requests</th>
                <td class="bs-PropertyList-definition table-row-definition">Too many requests hit the API too quickly.</td>
              </tr>
                <tr><th class="bs-PropertyList-property table-row-property">500, 502, 503, 504 - Server Errors</th>
                <td class="bs-PropertyList-definition table-row-definition">Something went wrong on Rahasi's end. (These are rare.)</td>
              </tr>
            </tbody>
          </table>
        </section>
</p>

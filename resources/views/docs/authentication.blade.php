<p><a name="authentication"></a></p>
<h1>Authentication</h1>
<p>
Authenticate your account when using the API by including your secret API key in the request. 
Your API keys carry many privileges, so be sure to keep them secret! Do not share your secret API keys in publicly 
accessible areas such GitHub, client-side code, and so forth.
Authentication to the API is performed via HTTP Basic Auth. 
</p>
<p>
Provide your API key in the header of your request with the name <code class="language-bash">private_api_key</code>. 
You do not need to provide a password.All API requests must be made over HTTPS. 
Calls made over plain HTTP will fail. API requests without authentication will also fail.
</p>
<p>
    <h3>SAMPLE AUTHENTICATION ERROR</h3>
    <pre class=" language-json">
{
  "code": "401",
  "status": "ERROR",
  "description": "The provided Api Key is not valid."
}
    </pre>
</p>
<h3>Example</h3>
<pre class=" language-bash">
      "private_api_key:test_sk_903dce8df892e020b3943dcf03dd6"
</pre>
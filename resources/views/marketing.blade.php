@extends('welcome')

@section('content')

<nav id="slide-menu" class="slide-menu" role="navigation">

	<div class="brand">
		<a href="/">
		</a>
	</div>

	<ul class="slide-main-nav">
		@include('partials.main-nav')
	</ul>

</nav>

<section class="panel statement light">
	<div class="content">
		<h1>Love beautiful API? We do too.</h1>
		<p>The platform for the smart merchant</p>
		<div class='browser-window'>
			<div class='top-bar'>
				<div class='circles'>
					<div class="circle circle-red"></div>
					<div class="circle circle-yellow"></div>
					<div class="circle circle-green"></div>
				</div>
			</div>
			<div class='window-content'>
				<pre class="line-numbers"><code class="language-javascript">
{
  "code": 0,
  "status": "error",
  "description": "Failed to connect to jsonplaceholder.typicode.com port 80: Connection timed out",
  "transactionid": "14569430545308d2ef27b42816d20a3addd7d48d"
}
			</code></pre>
				</div>
			</div>

		</div>
	</div>

</section>


<section class="panel features dark" id="features">
	<h1>Did someone say rapid?</h1>
	<p>Elegant integration delivered at warp speed.</p>
		<div class="blocks stacked">
			<div class="block odd">
				<div class="text">
					<h2>Expressive, beautiful syntax.</h2>
					<p>Value elegance, simplicity, and readability? You’ll fit right in. Rahasi is designed for people just like you. If you need help getting started, check out our <a href="/docs">great documentation</a>.</p>
				</div>
				<div class="media">

					<div class='browser-window'>
						<div class='top-bar'>
							<div class='circles'>
								<div class="circle circle-red"></div>
								<div class="circle circle-yellow"></div>
								<div class="circle circle-green"></div>
							</div>
						</div>
						<div class='window-content'>
							<pre class="line-numbers"><code class="language-javascript">
{
  "transactionid":"8937287870166",
  "merchant_code":"1456916123",
  "description":"paying for water bill",
  "reference_number":"99882700127-23",
  "msisdn":"250722123770",
  "amount": 9000
}
							</code>
						  </pre>
						</div>
					</div>

				</div>
			</div><!-- /.block -->
			<div class="block even">
				<div class="text">
					<h2>Tailored for your team.</h2>
					<p>Whether you're a solo developer or a 20 person team, Rahasi is a breath of fresh air. Keep everyone in sync using Rahasi's dashboard agnostic <a href="/docs/dashboard">Dashboard</a> and <a href="/docs/migrations">schema builder</a>.</p>
				</div>
				<div class="media">
					<div class="terminal-window">
						<div class='top-bar'></div>
						<div class='window-content'>
							<div class="dark-code">
							<pre><code class="language-javascript">
{
  "error": {
    "code": "GEN-WRONG-ARGS",
    "http_code": 400,
    "message": "Transaction id(8937207870166) has been used by you before, please correct this and try again"
  }
}
</code></pre></div>
						</div>
					</div>
				</div>
			</div><!-- /.block -->
			<div class="block odd">
				<div class="text">
					<h2>Modern toolkit. Pinch of magic.</h2>
					<p>An <a href="/docs/dashboard">amazing Dashboard</a>, painless <a href="/docs/reporting">reporting</a>, powerful <a href="/docs/logs">activity monitor</a>, and <a href="/docs/authentication">simple authentication</a> give you the tools you need for modern, maintainable APIs. We sweat the small stuff to help you deliver amazing integration.
				</div>
				<div class="media">

					<div class='browser-window'>
						<div class='top-bar'>
							<div class='circles'>
								<div class="circle circle-red"></div>
								<div class="circle circle-yellow"></div>
								<div class="circle circle-green"></div>
							</div>
						</div>
						<div class='window-content'>
							<pre class="line-numbers"><code class="language-php">
Route::resource('photos', 'PhotoController');

/**
 * Retrieve A User...
 */
Route::get('/user/{user}', function(App\User $user)
{
	return $user;
})
</code></pre>
					</div>
				</div>
			</div><!-- /.block -->
		</div>

	</section>

@endsection
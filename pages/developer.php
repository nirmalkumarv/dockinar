<div class="container">
		  <div class=" tab-container" style="padding-top:30px;">
			<h3>API for developers</h3>
			<div class="row" style="top-margin:10px; padding-top:10px; padding-left:20px;">
				
				<div id="developer-tab" class="new-list ">
					<div class="" id="OrganizerList" >
						<div  style="padding-top:10px"><span>Accessing the webinar through api</span></div>
						<div style="padding-top:10px;"><span>Below is a sample api request to get the list of upcomming webinars and their details
						<div class="table-content" style="padding-top:20px;">
							<table class="table table-hover" style="width:100%">
							  <thead>
								  <tr>
									<th>Request</th>
									<th>API</th>
									<th>Usage</th>
									<th>Input options</th>
									<th>Sample JSON</th>
								  </tr>
								</thead>
								<tbody>
								  <tr>
									<td style="width:10%">GET</td>
									<td style="width:20%"><code>services/do-api.php?request=webinar&mode=up<code></td>
									<td style="width:20%">Get tde list of all upcoming webinars.</td>
									<td style="width:30%">mode can have values like all, up, past to get all webinars, upcoming webinars and past webinars respectively.</td>
									<td style="width:20%">"items":[
									 {
										"id":"1",
										"title":"Decreasing False Positives in Automated Testing ",
										"description":"",
										"logo":"sauce-labs-logo.png",
										"4":"http:\/\/sauceio.com\/index.php\/2015\/03\/decreasing-false-positives-in-automated-testing-webinar\/",
										"register_url":"http:\/\/sauceio.com\/index.php\/2015\/03\/decreasing-false-positives-in-automated-testing-webinar\/",
										"5":null,
										"date":"",
										"6":null,
										"speaker":"",
										"7":"http:\/\/sauceio.com\/index.php\/2015\/03\/decreasing-false-positives-in-automated-testing-webinar\/",
										"webinar_url":"http:\/\/sauceio.com\/index.php\/2015\/03\/decreasing-false-positives-in-automated-testing-webinar\/"
									 }]
									</td>
								  </tr>
								  <tr>
									<td>GET</td>
									<td><code>services/do-api.php?request=webinar&cd1,2,4,6&mode=up<code></td>
									<td>Get tde list of upcoming webinars which belongs to certain categories</td>
									<td>mode can have values like all, up, past to get all webinars, upcoming webinars and past webinars respectively.</td>
									<td>"items":[
									 {
										"title":"Decreasing False Positives in Automated Testing ",
										"description":"",
										"logo":"sauce-labs-logo.png",
										"register_url":"http:\/\/sauceio.com\/index.php\/2015\/03\/decreasing-false-positives-in-automated-testing-webinar\/",
										"speaker":"",
										"webinar_url":"http:\/\/sauceio.com\/index.php\/2015\/03\/decreasing-false-positives-in-automated-testing-webinar\/"
									 }]
									</td>
								  </tr>
								  <tr>
									<td>GET</td>
									<td><code>services/do-api.php?request=category<code></td>
									<td>Get tde list of categories by which tde webinar can be classified</td>
									<td></td>
									<td>"items":[
									 {
										"id":"1",
										"name":"Hosting"
									 },
									 {
										"id":"2",
										"name":"Cloud Computing"
									 }]
									</td>
								  </tr>
								  <tr>
									<td>GET</td>
									<td><code>services/do-api.php?request=organizer<code></td>
									<td>Get tde list of details of tde webinar organizer</td>
									<td></td>
									<td>"items":[
									 {
										"logo":"accenture.jpg",
										"id":"1"
									 },
									 {
										"logo":"adobe.jpg",
										"id":"2"
									 },
									 {
										"logo":"amazon_logo.png",
										"id":"3"
									 }]
									</td>
								  </tr>
								</tbody>
							</table>

						</div>
					</div>
				</div>
				
			</div>
		  </div>
		  <div class="row"></div>
		  <div class="row">
		  <center>
			<div class="" style="padding-top:20px;">
				<div class="submit" >
					<button class="btn btn-default" type="submit">Sign up for Developer Account</button>
				</div>
			</div>
			</center>
		  </div>
		  
		  </div>
<script src="assets/app.js"></script>
<script>
/*
	$("#categoryList").on("change",function(){
		var ids = $('#categoryList input:checkbox:checked').map(function() {
			return this.value;
		}).get();

	var requestURL = "services/do-api.php?rquest=webinar&cd1="+ids.join(",")+"&mode="+activeName;
	renderList(templateId,tagId,requestURL,activeTabId);
});
});*/
</script>
<style>
a{color:#585E51};
</style>
<div class="container">
	<div class="col-md-3 tab-container" style="min-height:300px;">
		<div class="row tab-content col-md-3">
			<div id="category-list-tab" class="container new-list active tab-pane">

				<div class="col-md-3" id="categoryList" >
					<div class="col-md-offset-2">
						<a href="https://twitter.com/dockinar" class="twitter-follow-button" data-show-count="false">Follow @dockinar</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

						</div>
					<h3 style="top-margin:10px;">Categories</h3>


					<script id="category-list-template" type="text/x-handlebars-template">
						<ul class="list-group">
							{{#items}}
							<li class="list-group-item" >
								<div class="checkbox chkfilter" style="margin:0">
									<label>
										<input type="checkbox" value="{{id}}" >
										{{name}}
									</label>
								</div>
							</li>
							{{/items}}
						</ul>

					</script>

				</div>
			</div>
		</div>


	</div>
	<div class="col-mod-1"></div>

	<div class="col-md-8 tab-container">

		<div class="tab-menu">
			<center>
				<div class="btn-group filter" role="group" aria-label="Default button group">
					<button  data-filter="up" class="btn btn-default  wfilter">Upcoming</button>
					<button  data-filter="past" class="btn btn-default wfilter">Past</button>
					<button data-filter="all" class="btn btn-default active wfilter">Show All</button>


				</div>
			<center>
			</div>
			<div class="list-group row tab-content col-md-8" style="top-margin:10px; padding-top:20px;">
					<div id="new-list-tab" class="container new-list active tab-pane">
						<div class="col-md-8" id="webinarList" >

						</div>
					</div>
				</div>
			</div>
		</div>

		<script id="list-template" type="text/x-handlebars-template">
		<ul class="list-group">
		{{#items}}
		<li class="list-group-item">
		<img src="data/webinar-logos/{{logo}}" alt="" class="pull-right img-circle1" style="height:30px;"/>
		<a target="_blank" href="{{webinar_reg_url}}">
		<h4 class="list-group-item-heading">{{title}}</h4>

		</a>
		<span>on {{wdate}} {{wtime}} by <a href="{{org_url}}">{{org_name}}</a></span>
		<p class="list-group-item-text">{{speaker}}</p>
		<div>
		<div class="pull-right"> <a target="_blank" href={{register_url}} target="_blank" class="btn btn-success btn-sm">Register</a> <a href="services/twilio.php" target="_blank" title="Subscribe to webinars like this from {{org_name}}" class="btn btn-success btn-sm">Subscribe</a>
		
		</div>
		</div>
		<ul class="nav nav-tabs">


		<li ><a  title="add to favorite" ><span class="glyphicon glyphicon-heart"></span></a></li>
		<li><a href="?=main&sub=1&org_id={{org_id}}" title="Notify event like this" ><span class="glyphicon glyphicon-time"></span></a></li>
		<li><a href="#e" title="add to calendar"><span class="glyphicon glyphicon-calendar"></span></a></li>


		</ul>


		</li>
		{{/items}}
		</ul>
		</script>
<script>
($(function(){
	renderCategoryList();
	renderList("up");
}));
</script>

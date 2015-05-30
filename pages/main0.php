<script src="assets/app.js"></script>
<script>
$(document).ready(function(){
	$("#dead-list-menu").on("click",function(){

		renderList("#list-template-past","#webinarPastList","past",this);

	});
	$("#new-list-menu").on("click",function(){

		renderList("#list-template-new","#webinarNewList","up",this);
	});
	$("#all-list-menu").on("click",function(){

		renderList("#list-template-all","#webinarAllList","all",this);
	});
	$("#categoryList").on("change",function(){
		var ids = $('#categoryList input:checkbox:checked').map(function() {
			return this.value;
		}).get();
		/*$('#categoryList input:checked').each(function() {
		ids.push($('#categoryList input:checked').val());
	});*/
	var activeName = "";
	var activeTabId = "";
	var templateId = "";
	var tagId = "";
	if($( ".tab-menu a" ).hasClass( "active" ) && $( ".tab-menu a" ).attr("id"))
		{
			activeTabId = $( ".tab-menu a" ).attr("id");
			activeName = activeTabId == "new-list-menu" ? "up" : activeTabId == "dead-list-menu" ? "past" : "all";
			templateId = activeTabId == "new-list-menu" ? "#list-template-new" : activeTabId == "dead-list-menu" ? "#list-template-past" : "#list-template-all";
			tagId = activeTabId == "new-list-menu" ? "#webinarNewList" : activeTabId == "dead-list-menu" ? "#webinarPastList" : "#webinarAllList";
		}
		/*if($( ".tab-menu a" ).hasClass( "active" )){
		activeName = $($this).text() =="Upcoming" ? "up" : "past";
	}*/
	//var activeTabId = $( ".tab-menu li" ).hasClass( "active" );//.attr("id");
	//var activeName = activeTabId.attr("id");
	//activeTabId = activeTabId == "new-list-menu" ? "up" : "past;"
	var requestURL = "services/do-api.php?rquest=webinar&cd1="+ids.join(",")+"&mode="+activeName;
	renderList(templateId,tagId,requestURL,activeTabId);
});
});
</script>
<div class="container">
	<div class="col-md-3 tab-container" style="min-height:300px;">
		<div class="row tab-content col-md-3">
			<div id="category-list-tab" class="container new-list active tab-pane">

				<div class="col-md-3" id="categoryList" >
					<h3 style="top-margin:10px;">Categories</h3>


					<script id="category-list-template" type="text/x-handlebars-template">
						<ul class="list-group">
							{{#items}}
							<li class="list-group-item" >
								<div class="checkbox" style="margin:0">
									<label>
										<input type="checkbox" value="{{id}}">
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

					<a id="new-list-menu" href="#new-list-tab" data-toggle="tab" class="btn btn-default active">Upcoming</a>
					<a id="dead-list-menu" href="#dead-list-tab" data-toggle="tab" class="btn btn-default">Past</a>
					<a id="all-list-menu" href="#all-list-tab" data-toggle="tab" class="btn btn-default">Show All</a>
				</div>
				<center>

				</div>



				<div class="list-group row tab-content col-md-8" style="top-margin:10px; padding-top:20px;">
					<div id="new-list-tab" class="container new-list active tab-pane">
						<div class="col-md-8" id="webinarNewList" >

							<script id="list-template-new" type="text/x-handlebars-template">
								<ul class="list-group">
									{{#items}}
									<li class="list-group-item">
										<img src="data/webinar-logos/{{logo}}" alt="" class="img-circle1" style="height:30px;"/>
										<a href="#">
											<h4 class="list-group-item-heading">{{title}}</h4>
											<p class="list-group-item-text">-By {{speaker}}</p>
										</a>
									</li>
									{{/items}}
								</ul>
							</script>
						</div>
					</div>
					<div id="dead-list-tab" class="container dead-list tab-pane">
						<div class="list-group col-md-8" id="webinarPastList" >
							<script id="list-template-past" type="text/x-handlebars-template">
								<ul class="list-group">
									{{#items}}
									<li class="list-group-item">
										<img src="data/webinar-logos/{{logo}}" alt="" class="img-circle" style="width:30px;height:35px;/>
										<a href="#">
											<h4 class="list-group-item-heading">{{title}}</h4>
											<p class="list-group-item-text">-By speaker</p>
										</a>
									</li>
									{{/items}}
								</ul>
							</script>
						</div>
					</div>
					<div id="all-list-tab" class="container dead-list tab-pane">
						<div class="list-group col-md-8" id="webinarAllList" >
							<script id="list-template-all" type="text/x-handlebars-template">
								<ul class="list-group">
									{{#items}}
									<li class="list-group-item">
										<img src="data/webinar-logos/{{logo}}" alt="" class="img-circle" style="width:30px;height:35px;/>
										<a href="#">
											<h4 class="list-group-item-heading">{{title}}</h4>
											<p class="list-group-item-text">-By speaker</p>
										</a>
									</li>
									{{/items}}
								</ul>
							</script>
						</div>
					</div>
				</div>
			</div>

		</div>
		<script>
			($(function(){
				$("#new-list-menu").click();

			}))
		</script>
		

var catList="";
var filterList="";
($(function(){
	$(".wfilter").click(function(evt){

		var btnItem=$(this);
		var filterBy=btnItem.data("filter")	;
		$(".wfilter").removeClass("active");
		btnItem.addClass("active");
		renderList(filterBy);
	});

}));

($(function(){

	showOrgList();



}));




function renderCategoryList(){
	$.get( "services/do-api.php?rquest=category", function( response ) {
		var source = $("#category-list-template").html();
		var template = Handlebars.compile(source);
		//renderList(response.data);
		$('#categoryList').append(template(response.data));

		$(".chkfilter").change(function(e){

			var selected = [];
			$('.chkfilter input:checked').each(function() {
				selected.push($(this).attr('value'));
			});
			catList=selected.toString();

			renderList(filterList);


		})



	});

}


function renderList(requestFor){
	var source = $("#list-template").html();
	var template = Handlebars.compile(source);


	$("#webinarList").html('Loading..');
	filterList=requestFor;
	var requestPath="services/do-api.php?rquest=webinar&mode=" + requestFor;
	if(catList!="") requestPath=requestPath+ "&catId=" + catList;
	$.get(requestPath, function( response ) {

	$("#webinarList").html(template(response.data));

	});

}



function showOrgList(){
	$.get( "services/do-api.php?rquest=organizer", function( response ) {
	var source = $("#list-template-organizer").html();
	var template = Handlebars.compile(source);

	$('#OrganizerList').append(template(response.data));

	});

}

//renderList("#list-template-new","#webinarNewList");

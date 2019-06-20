$(document).ready(function(){
	$("#sidebar").on("click","li a",function(){
		$.post("listreader.php", {listname : $(this).html()}, function(data){
			$("#main").html(data);
		});
		return false;
	});
    $("#main").on("click",".sortpanel button",function(){
        itemId = $(this).parent().parent().attr("data-num");
	    itemVal = $(this).parent().siblings('a').html();
        listName = $(this).html();
        if(listName!=="DEL") controllerName = "listwriter.php";
            else {
                    controllerName = "listcleaner.php";
                    listName = $(this).parent().parent().attr("data-list");
                }
        $.post(controllerName, {listname : listName, id : itemId, value : itemVal}, function(data){
            $("#main").html(data);
        });
        return false;
    });
});

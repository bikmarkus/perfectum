$(document).ready(function(){
	$("#sidebar").on("click","li a",function(){
		$.post("listreader.php", {listname : $(this).html()}, function(data){
			$("#main").html(data);
		});
		return false;
	});
    $("#main").on("click",".sortpanel button",function(){
        var itemId = $(this).parent().parent().attr("data-num");
        $.post("listwriter.php", {listname : $(this).html(), id : itemId}, function(data){
            $("#main").html(data);
        });
        return false;
    });
});

$(document).ready(function(){
	$("#sidebar").on("click","li a",function(){
		console.log($(this).html());
		$.post("listreader.php", {listname : $(this).html()}, function(data){
			$("#main").html(data);
		});
		return false;
	});
});

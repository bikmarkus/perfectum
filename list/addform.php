<div class="innertube">
	<h1>Add new list item</h1>               
</div>

<form action="/list/controller.php" method="POST" id="additem">
	<input type="hidden" name="add">
	<input type="text" placeholder="Add text here..." name="itemtext">
	<input type="submit" value="ADD">
	<p>
		<input name="listpicker" type="radio" checked value="inbox">Inbox
		<input name="listpicker" type="radio" value="next">Next
		<input name="listpicker" type="radio" value="someday">Someday
	</p>
</form>

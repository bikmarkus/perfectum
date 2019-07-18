<div class="innertube">
	<h1>Add new project</h1>
</div>
<form action="/project/controller.php" method="POST" id="addproject">
	<input type="hidden" name="add">
	<input type="text" placeholder="Add project name here..." name="project_title">
	<textarea placeholder="Add project description here..." name="project_description"></textarea>
	<input type="text" placeholder="Add next item text here..." name="next_item">
	<input type="submit" value="SUBMIT THE PROJECT">
</form>
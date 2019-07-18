<div class="innertube">
	<h1>Edit project</h1>
</div>
<form action="/project/controller.php" method="POST" id="addproject">
	<input type="hidden" name="edited">
	<input type="hidden" name="id" value="<?php echo $_REQUEST["project_dets"]['id']; ?>" >
	<input type="text" value="<?php echo $_REQUEST["project_dets"]['title']; ?>" name="project_title">
	<textarea name="project_description"><?php echo $_REQUEST["project_dets"]['description']; ?>
	</textarea>
	<input type="text" value="<?php echo $_REQUEST["project_dets"]['next']; ?>" name="next_item">
	<input type="submit" value="SAVE THE PROJECT">
</form>
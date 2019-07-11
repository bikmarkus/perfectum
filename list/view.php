 <!DOCTYPE html>
<html>
<head>
	<title>Perfectum</title>
	<link rel="stylesheet" href="/assets/styles.css" />
	<script src="/assets/jquery.js"></script>
	<script src="/assets/script.js"></script>	
</head>

<body>
	<main>
		<?php if (isset($_REQUEST['listItems'])) { ?>			
		<div class="innertube">
			<h1><?php echo $_REQUEST['name'];
			?></h1>
		</div>
		<div class="item-container">
			<ul class="item-list">
			<?php 
				foreach($_REQUEST['listItems'] as $id => $item){ ?>
				<li class="item">
					<div class="item-row">
						<span>
							<?php echo $item; ?>				
						</span>
						<div class="item-controls">
							<a href="<?php echo $_SERVER['REQUEST_URI']."/del/".$id; ?>">DEL</a>
						</div>
					</div>
				</li>
				<?php } ?>
			</ul>
		</div>
		<?php } else {
				include_once('addform.php');	
		} ?>
	</main>
	<nav id="nav">
		<div class="innertube">	
			<h3>Control panel</h3>
			<ul>
				<li><a href="/list/inbox">Inbox</a></li>
				<li><a href="/list/next">Next</a></li>
				<li><a href="/list/projects">Projects</a></li>
				<li><a href="/list/someday">Someday</a></li>
				<li><a href="/list/reference">Reference</a></li>
			</ul>
			<h4><a href="/list/add">Add new item</a></h4>
		</div>
	</nav>
</body>
</html> 

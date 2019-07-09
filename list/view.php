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
		<div class="innertube">
			<h1><?php echo $_REQUEST['name'];
			/*echo '<pre>';
			var_dump($_REQUEST['listItems']);
			echo '</pre>';*/
			?></h1>
		</div>
		<div class="item-container">
			<ul class="item-list">
			<?php 
				$i=0;
				foreach($_REQUEST['listItems'] as $item){ ?>
				<li class="item">
					<div class="item-row">
						<span>
							<?php echo $item; ?>				
						</span>
						<div class="item-controls">
							<a href="<?php echo $_SERVER['REQUEST_URI']."/del/".++$i; ?>">DEL</a>
						</div>
					</div>
				</li>
				<?php } ?>
			</ul>
		</div>
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
		</div>
	</nav>
</body>
</html> 

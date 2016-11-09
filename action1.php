<?php include ("servernav.php") ?>
<html>
	<head>
		<title>Action1</title>
	</head>
	<?php if( isset($_SESSION['user'])){ ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<body>
					<h1>Action wirt ausgeführt!!!</h1>
					<?php
					$output1 = shell_exec('ls');
					echo "<pre>$output1</pre>";
					?>
					<?php $site = "index.php"; header( "refresh:3;url=$site" ); ?>
				</body>
			</div>
		</div>
	</div>
</html>
	<?php } ?>

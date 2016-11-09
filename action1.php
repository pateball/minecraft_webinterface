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
					<h1>Action wirt Neugestartrt!!!</h1>
					<?php
					$output1 = shell_exec('service mc_phl restart');
					echo "<pre>$output1</pre>";
					$output2 = shell_exec('service mc_phl exec say hi');
					echo "<pre>$output2</pre>";
					?>
					<?php $site = "index.php"; header( "refresh:3;url=$site" ); ?>
				</body>
			</div>
		</div>
	</div>
</html>
	<?php } ?>
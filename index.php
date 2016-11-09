<?php include ("servernav.php") ?>

<html>
	<head>
		<title>Webinterface</title>
	</head>
</html>
<?php if( isset($_SESSION['user'])){ ?>
 <html>
	<body>
		<br><br>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<a class="btn btn-default" href="action1.php" role="button">Action1</a>
					<?php
						$output1 = shell_exec('ls');
						echo "<pre>$output1</pre>";
						$output2 = shell_exec('service mc_lobby status');
						echo "<pre>$output2</pre>";
						$output3 = shell_exec('service mc_build screen');
						echo "<pre>$output3</pre>";
					?>
				</div>
			</div>
		</div>
	</body>
</html>

<?php }if( !isset($_SESSION['user'])){ ?>

<?php include ("login.php")//ohne loginüberprüfung ?>

<?php } ?>
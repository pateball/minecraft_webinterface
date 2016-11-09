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
				<div class="col-md-2 col-md-offset-8">
					<div class="btn-group">
						<a href="action1.php">
							<button type="button" class="btn btn-default">Start</button>
						</a>
						<a href="action2.php">
							<button type="button" class="btn btn-default">Stop</button>
						</a>
						<a href="action3.php">
							<button type="button" class="btn btn-default">Restart</button>
						</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<?php
						$output1 = shell_exec('ls');
						echo "<pre>$output1</pre>";
						$output2 = shell_exec('service mc_phl status');
						echo "<pre>$output2</pre>";
						$output3 = shell_exec('service mc_phl exec say hallo');
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
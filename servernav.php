<head>
	
<link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="standard.css" type="text/css"/>
</head>
<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';
 

 ?>
<?php 
	$index = "";
	$server = "";
	$forum = "";
	$team = "";

$aktuelleseite = $_SERVER['PHP_SELF']; 
$aktuelleseitevar = $_SERVER['REQUEST_URI'];

/*eingelogt*/
if( isset($_SESSION['user'])){

/*Diverses*/
if($aktuelleseite == "/forum/home.php"){
	$index = "active";
}elseif($aktuelleseite == "/forum/server.php"){
	$server = "active";
}elseif($aktuelleseite == "/forum/serverteam.php"){
	$team = "active";
}
/*Foren*/
elseif($aktuelleseite == "/forum/showthreads.php"){
	$forum = "active";
}elseif($aktuelleseite == "/forum/over.php"){
	$forum = "active";
}elseif($aktuelleseite == "/forum/showposts.php"){
	$forum = "active";
}
}

//if( isset($_SESSION['user'])){
	$res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
 	$userRow=mysql_fetch_array($res);
 
	$indexs = "home.php";
	$tests = "server.php";
	$teams = "serverteam.php";
	$forums = "over.php";
	$cando = "HI ";
	$drop = '<li role="separator" class="divider"></li>
			<li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
			';
	
//}


?>
<!-- TODO: unterscheiden -->


<body>
<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand <?php echo $index; ?>" href="<?php echo $indexs; ?>">Home</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class=" <?php echo $server; ?>"><a href="<?php echo $tests; ?>">Server</a></li>
            <li class=" <?php echo $forum; ?>"><a href="<?php echo $forums; ?>">Forum</a></li>
            <li class=" <?php echo $team; ?>"><a href="<?php echo $teams; ?>">Team</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
     <span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo $cando; ?><?php echo $userRow['userName']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
              <?php echo $drop; ?>
              <!--
                <li><a href="login.php">Login</a></li>
				<li><a href="register.php">Register</a></li>-->
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	<script src="assets/jquery-1.11.3-jquery.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>


<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="meinModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Schließen"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="meinModalLabel">Login</h4>
      </div>
      <div class="modal-body class="container-fluid">
        
        <?php
		
 if( isset($_POST['btn-login']) ) { 
  
  $email = $_POST['email'];
  $upass = $_POST['pass'];
  
  $email = strip_tags(trim($email));
  $upass = strip_tags(trim($upass));
  
  $password = hash('sha256', $upass); // password hashing using SHA256
  
  $res=mysql_query("SELECT userId, userName, userPass FROM users WHERE userName='$email'");
  
  $row=mysql_fetch_array($res);
  
  $count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
  
  if( $count == 1 && $row['userPass']==$password ) {
   $_SESSION['user'] = $row['userId'];
   header("Location: $aktuelleseitevar");
  } else {
   $errMSG = "Wrong Credentials, Try again...";
  }
 }
?>

<div>

 <div id="login-form">
    <form method="post" autocomplete="off">
    
     <div >
        
         <div class="form-group">
             <h2 class="">Sign In.</h2>
            </div>
        
         <div class="form-group">
             <hr />
            </div>
            
            <?php
   if ( isset($errMSG) ) {
    
    ?>
    <div class="form-group">
             <div class="alert alert-danger">
    <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
             </div>
                <?php
   }
   ?>
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
             <input type="text" name="email" class="form-control" placeholder="Your Name" required />
                </div>
            </div>
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
             <input type="password" name="pass" class="form-control" placeholder="Your Password" required />
                </div>
            </div>
            	
            
            <div class="form-group">
             <hr />
            </div>
            
            <div class="form-group">
            </div>
        
        </div>
   
    
    </div> 

</div>
        
      </div>
      <div class="modal-footer">
      	<div class="form-group">
            <button type="button" class="btn btn-default" data-dismiss="modal">Schließen</button>
           	<button type="submit" name="btn-login" class="btn btn-primary">Anmelden</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>



</body>
<br><br>

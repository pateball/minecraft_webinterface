<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';
 
 
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
   header("Location: index.php");
  } else {
   $errMSG = "Wrong Credentials, Try again...";
  }
 }
?>
<body>
<div class="container">

 <div id="login-form">
    <form method="post" autocomplete="off">
    
     <div class="col-md-12">
        
        
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
             <button type="submit" class="btn btn-block btn-primary" name="btn-login">Sign In</button>
            </div>
            
            <div class="form-group">
             <hr />
            </div>
        
        </div>
   
    </form>
    </div> 

</div>

</body>
</html>

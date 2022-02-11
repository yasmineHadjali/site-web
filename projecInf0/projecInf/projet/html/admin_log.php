
<?php
session_start();
$db = mysqli_connect("localhost","root","","projet");
if(isset($_POST['login_btn'])){
    
    $username = mysqli_real_escape_string($db,$_POST['username']);
    $password= mysqli_real_escape_string($db,$_POST['password']);
  
    $password == md5($password);
    $sql = "SELECT * from admine where username='$username' AND passeword='$password' ";
    $result = mysqli_query($db, $sql);

    if (mysqli_num_rows( $result) == 1){
        $_SESSION['message'] = "vous etes connecter";
        $_SESSION['username'] = $username;
        header("location:admin_espace.php");
    }else{
        $_SESSION['message'] = "Le mot de passe ou le nom d'utilisateur n'est pas correct";
        
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion admin</title>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
	</head>
<body class="container">
    <?php
    if(isset($_SESSION['message'])){
        echo '<div id="error_msg">'.$_SESSION['message'].'</div>';
        unset($_SESSION['message']);
    }
    ?>
   <form action="admin_log.php" method="POST" onsubmit="return validation()">
     <h3>Connexion de l'admin</h3>
   
<div class="input-group">
       <label>Nom d'utilisateur</label>
       <input type="text" name="username" placeholder="saisi votre nom d'utilisateur" id="user" autocomplete="off">
	   <span id="username" class="text-danger font-weight-bold"> </span>
</div>

<div class="input-group">
       <label>Mot de passe</label>
       <input type="password" name="password" placeholder="saisi votre mot de passe" id="pass" autocomplete="off">
	    <span id="passwords" class="text-danger font-weight-bold"> </span>
</div> 
<div class="input-group">
    <button type="submit" name="login_btn" class="btn">Connexion</button>
</div>
      
   </form>
 
   <script type="text/javascript">
		function validation(){
			var user = document.getElementById('user').value;
			var pass = document.getElementById('pass').value;
			if(user == ""){
				document.getElementById('username').innerHTML =" ** S'il vous plait remplir le champs de nom";
				return false;
			}
			if((user.length <= 2) || (user.length > 20)) {
				document.getElementById('username').innerHTML =" ** la taille de nom entre 2 et 20 caractère";
				return false;	
			}
			if(!isNaN(user)){
				document.getElementById('username').innerHTML =" ** Seuls les caractère sont auorisés";
				return false;
			}
			if(pass == ""){
				document.getElementById('passwords').innerHTML =" ** S'il vous plait remplir le champs de mot de passe";
				return false;
			}
			if((pass.length <= 5) || (pass.length > 20)) {
				document.getElementById('passwords').innerHTML =" ** La taille de mot de passe entre 5 et20 caractère";
				return false;	
			}
			}
	</script>
</body>
</html>

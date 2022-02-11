<?php include('server.php'); ?>
<?php require 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<link rel="stylesheet" type="text/css" href="../css/connexion.css">
	<link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/all.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body class="container">
   <form action="login.php" method="post" onsubmit="return validation()">
     <h3>Connexion</h3>
   <?php include('errors.php');?>
<div class="input-group">
       <label>username</label>
       <input type="text" name="username" placeholder="saisi votre nom d'utilisateur" id="user" autocomplete="off">
	   <span id="username" class="text-danger font-weight-bold"> </span>
</div>

<div class="input-group">
       <label>password</label>
       <input type="text" name="password_1" placeholder="saisi votre mot de passe" id="pass" autocomplete="off">
	    <span id="passwords" class="text-danger font-weight-bold"> </span>
</div>
<div class="iam-radio" id="rememberID"> 
          <input type="checkbox" id="remIdChkYN" data-ng-model="vm.remIdChkYN" ng-enter="" class="ng-pristine ng-untouched ng-valid ng-empty" autocomplete="off">
           <label for="remIdChkYN" class="ch">se sevenir de moi</label> </div>  
<div class="input-group">
    <button type="submit" name="login" class="btn">Connexion</button>
</div>
<div class="bottom-text">
          vous avez pas un compte? <a href="register.php">Inscrit</a>
        </div>
		<div class="bottom-text">
          <a href="Mot de passe oublie.html" class="f">Mot de passe oublié?</a>
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
<?php require 'footer.php'; ?>
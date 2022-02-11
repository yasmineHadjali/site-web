<?php include('server.php'); ?>
<?php require 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<link rel="stylesheet" type="text/css" href="../css/inscription.css">
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
  
   <form action="register.php" method="post" onsubmit="return validation()">
     <h3>Inscription</h3>
   <?php include('errors.php');?>
   <div class="input-group">
       <label>Nom</label><br>
       <input type="text" name="nom" placeholder="saisi votre nom" id="nom" autocomplete="off">
	   <span id="nome" class="text-danger font-weight-bold"> </span>
</div>
<div class="input-group">
       <label>Prénom</label>
       <input type="text" name="prenom" placeholder="saisi votre nom prénom" id="prenom" autocomplete="off">
	   <span id="prenome" class="text-danger font-weight-bold"> </span>
</div>
<div class="input-group">
       <label>username</label>
       <input type="text" name="username" placeholder="saisi votre nom d'utilisateur" id="user" value="<?php echo $username; ?>" autocomplete="off">
	   <span id="username" class="text-danger font-weight-bold"> </span>
</div>
<div class="input-group">
       <label>Email</label>
       <input type="text" name="email" placeholder="saisi votre mail" id="emails" value="<?php echo $email; ?>" autocomplete="off">
	   <span id="emailids" class="text-danger font-weight-bold"> </span>
</div>
<div class="input-group">
       <label>password</label>
       <input type="text" name="password_1"  placeholder="saisi votre mot de passe" id="pass" autocomplete="off">
	   <span id="passwords" class="text-danger font-weight-bold"> </span>
</div>
<div class="input-group">
       <label>password</label>
       <input type="text" name="password_2" placeholder="Confirmer votre mot de passe" id="conpass" autocomplete="off">
	   <span id="confrmpass" class="text-danger font-weight-bold"> </span>
</div>
<div class="input-group">
       <label>N°téléphone</label>
       <input type="text" name="mobile" placeholder="saisi votre N°téléphone" id="mobileNumber" autocomplete="off">
	   <span id="mobileno" class="text-danger font-weight-bold"> </span>
</div>
<div class="input-group">
       <label>Date de néssance</label>
       <input type="date" name="datenaiss" class="form-control"  id="datenaiss" autocomplete="off" >
	   <span id="dates" class="text-danger font-weight-bold"> </span>
</div>
<div class="input-grou">
    <button type="submit" name="register" class="btn">register</button><br><br>
</div>
<p>
       already a member? <a href="login.php">Connexion</a>
   </p>
   </form>
   <script type="text/javascript">
		function validation(){
			var user = document.getElementById('user').value;
			var pass = document.getElementById('pass').value;
			var confirmpass = document.getElementById('conpass').value;
			var mobileNumber = document.getElementById('mobileNumber').value;
			var emails = document.getElementById('emails').value;
			var nom = document.getElementById('nom').value;
			var prenom = document.getElementById('prenom').value;
			var datenaiss = document.getElementById('datenaiss').value;
			if(nom == ""){
				document.getElementById('nome').innerHTML =" ** S'il vous plait remplir le champs de nom";
				return false;
			}
			if((nom.length <= 2) || (nom.length > 20)) {
				document.getElementById('nome').innerHTML =" ** la taille de nom entre 2 et 20 caractère";
				return false;	
			}
			if(!isNaN(nom)){
				document.getElementById('nome').innerHTML =" ** Seuls les caractère sont auorisés";
				return false;
			}
			
			
			if(prenom == ""){
				document.getElementById('prenome').innerHTML =" ** S'il vous plait remplir le champs de nom";
				return false;
			}
			if((prenom.length <= 2) || (prenom.length > 20)) {
				document.getElementById('prenome').innerHTML =" ** la taille de nom entre 2 et 20 caractère";
				return false;	
			}
			if(!isNaN(prenom)){
				document.getElementById('prenome').innerHTML =" ** Seuls les caractère sont auorisés";
				return false;
			}
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
			if(emails == ""){
				document.getElementById('emailids').innerHTML =" ** Veuillez remplir le champ de l'email";
				return false;
			}
			if(emails.indexOf('@') <= 0 ){
				document.getElementById('emailids').innerHTML =" ** Position Invalid @";
				return false;
			}
			if((emails.charAt(emails.length-4)!='.') && (emails.charAt(emails.length-3)!='.')){
				document.getElementById('emailids').innerHTML =" ** . Invalid Position";
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
			if(confirmpass == ""){
				document.getElementById('confrmpass').innerHTML =" ** veilez remplir le champ de confirmation";
				return false;
			}
			if(pass!=confirmpass){
				document.getElementById('confrmpass').innerHTML =" ** Le mot de passe ne correspond pas au mot de passe de confirmation";
				return false;
			}
			if(mobileNumber == ""){
				document.getElementById('mobileno').innerHTML =" ** veilez remplir le champ de numéro de téléphone";
				return false;
			}
			if(isNaN(mobileNumber)){
				document.getElementById('mobileno').innerHTML =" ** L'utilisateur ne doit écrire que des chiffres et non des caractères";
				return false;
			}
			if(mobileNumber.length!=10){
				document.getElementById('mobileno').innerHTML =" ** Le numéro de téléphone ne doit contenair que 10 chiffres";
				return false;
			}
			if(datenaiss == ""){
				document.getElementById('dates').innerHTML =" ** veilez remplir le champ de date de naissance";
				return false;
			}
		}
	</script>
</body>
</html>
<?php require 'footer.php'; ?>
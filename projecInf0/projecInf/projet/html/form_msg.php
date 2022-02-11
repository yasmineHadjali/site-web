
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion admin</title>
    <link rel="stylesheet" type="text/css" href="../css/connexion.css">

</head>
<body class="container">
  
   <form action="ajout_message.php" method="POST" >
     <h3>Connexion</h3>
   
<div class="input-group">
       <label>votre email</label>
       <input type="text" id="email" name="mail" placeholder="saisi votre nom d'utilisateur" id="user" autocomplete="off">
    
	   <span id="username" class="text-danger font-weight-bold"> </span>
</div>

<div class="input-group">
       <label>objetr</label>
       <input type="text" name="obj" id="objet" name="obj" placeholder="saisi votre objet" id="user" autocomplete="off">
       
	   <span id="username" class="text-danger font-weight-bold"> </span>
</div>
<div class="input-group">
       <label>message</label>
       <textarea type="password" name="mess" id="msg"  placeholder="message"  autocomplete="off"></textarea>
	    <span id="passwords" class="text-danger font-weight-bold"> </span>
</div> 
<div class="input-group">
    <button type="submit" name="login_btn" class="btn">Connexion</button>
</div>
      
   </form>
 
  
</body>
</html>

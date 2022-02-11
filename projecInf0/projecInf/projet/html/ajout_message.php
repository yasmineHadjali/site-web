<?php
 $host = 'localhost';
 $dbname = 'projet';
 $username = 'root';
 $password = '';


 $objetPdo = new PDO("mysql:host=$host;dbname=$dbname","$username","$password");
 $pdoStat = $objetPdo->prepare('INSERT INTO message VALUES (NULL, :email, :tel, :msg,  :nom, :prenom)');


 $pdoStat->bindValue(':email', $_POST['mail'], PDO::PARAM_STR);
 $pdoStat->bindValue(':tel', $_POST['telp'], PDO::PARAM_STR);
 $pdoStat->bindValue(':msg', $_POST['mess'], PDO::PARAM_STR);
 $pdoStat->bindValue(':nom', $_POST['name'], PDO::PARAM_STR);
 $pdoStat->bindValue(':prenom', $_POST['pname'], PDO::PARAM_STR);

 

 $Isok = $pdoStat->execute();
 if($Isok){
   $message = 'votre message a été envoyer';
 }else{
  $message = 'echec votre messge n\'a pas été envoyer ';
 }
 ?>
 <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ajout des du message</title>
    <link rel="stylesheet" href="../css/liste.css">
    
    
  </head>
  <body>
 <h1>Resultat de l'operation :</h1>
 
 <h4 id="msg"><?php echo $message; ?> </h4>
 <a href="index.php" style="text-decoration:none;" id="retour">Revenir en arrière</a><br /><br />

  </body>
  </html 
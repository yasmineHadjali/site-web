<?php
 $host = 'localhost';
 $dbname = 'projet';
 $username = 'root';
 $password = '';


 $objetPdo = new PDO("mysql:host=$host;dbname=$dbname","$username","$password");

 
 $pdoStat = $objetPdo->prepare('DELETE FROM users WHERE id=:num LIMIT 1');

 $pdoStat->bindValue(':num', $_GET['numClient'], PDO::PARAM_INT);

 $exeIsok = $pdoStat->execute();
 if($exeIsok){
 $message = 'Le client a été supprimé avec succés';
 }else{
  $message = 'echec de la suppression ';
 }
 ?>
 <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Supprimer un client</title>
    <link rel="stylesheet" href="../css/liste.css">
    
    
  </head>
  <body>
  <h1>Resultat de l'operation :</h1>
 <h4 id="msg" ><?php echo $message ; ?> </h4>
 <a href="lister_client.php" style="text-decoration:none;" id="retour">Revenir en arrière</a><br /><br />

  </body>
  </html 

 
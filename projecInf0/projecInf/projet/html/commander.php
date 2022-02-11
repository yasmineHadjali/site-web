<?php
 $host = 'localhost';
 $dbname = 'projet';
 $username = 'root';
 $password = '';


 $objetPdo = new PDO("mysql:host=$host;dbname=$dbname","$username","$password");
 $pdoStat = $objetPdo->prepare('INSERT INTO commande VALUES (NULL, :Nom_p, :Nom_cl, :prenom_cl, :adresse_liv, :numero_CIN, :numero_tel, :email)');


 $pdoStat->bindValue(':Nom_p', $_POST['prod'], PDO::PARAM_STR);
 $pdoStat->bindValue(':Nom_cl', $_POST['clientn'], PDO::PARAM_STR);
 $pdoStat->bindValue(':prenom_cl', $_POST['clientp'], PDO::PARAM_STR);
 $pdoStat->bindValue(':adresse_liv', $_POST['clientad'], PDO::PARAM_STR);
 $pdoStat->bindValue(':numero_CIN', $_POST['clientcni'], PDO::PARAM_STR);
 $pdoStat->bindValue(':numero_tel', $_POST['clienttel'], PDO::PARAM_STR);
 $pdoStat->bindValue(':email', $_POST['clientem'], PDO::PARAM_STR);
 $Isok = $pdoStat->execute();
 if($Isok){
   $message = 'Votre commande à bien été enregistrer';
 }else{
  $message = 'echec votre commande n\'a pas été enregistrer ';
 }
 ?>
 <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Votre Commande</title>
    <link rel="stylesheet" href="../css/liste.css">
    
    
  </head>
  <body>
 <h1>Resultat de l'operation :</h1>
 
 <h4 id="msg"><?php echo $message; ?> </h4>
 <a href="index.php" style="text-decoration:none;" id="retour">Revenir vers la page d'acceuil</a><br /><br />

  </body>
  </html 
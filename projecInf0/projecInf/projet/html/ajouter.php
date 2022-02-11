<?php
 $host = 'localhost';
 $dbname = 'projet';
 $username = 'root';
 $password = '';


 $objetPdo = new PDO("mysql:host=$host;dbname=$dbname","$username","$password");
 $pdoStat = $objetPdo->prepare('INSERT INTO produit VALUES (NULL, :referance, :nom, :qtt, :prix,  :caracteristique, :image, :id_cat)');


 $pdoStat->bindValue(':referance', $_POST['ref'], PDO::PARAM_STR);
 $pdoStat->bindValue(':nom', $_POST['nompr'], PDO::PARAM_STR);
 $pdoStat->bindValue(':prix', $_POST['prixp'], PDO::PARAM_STR);
 $pdoStat->bindValue(':qtt', $_POST['quantite'], PDO::PARAM_STR);
 $pdoStat->bindValue(':caracteristique', $_POST['caracp'], PDO::PARAM_STR);
 $pdoStat->bindValue(':image', $_POST['ima'], PDO::PARAM_STR);
 $pdoStat->bindValue(':id_cat', $_POST['cat'], PDO::PARAM_STR);
 $Isok = $pdoStat->execute();
 if($Isok){
   $message = 'Les données ont été ajouté à la base de donnée';
 }else{
  $message = 'echec les données n\'ont pas été ajouté à la base de donnée ';
 }
 ?>
 <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ajout des produits</title>
    <link rel="stylesheet" href="../css/liste.css">
    
    
  </head>
  <body>
 <h1>Resultat de l'operation :</h1>
 
 <h4 id="msg"><?php echo $message; ?> </h4>
 <a href="lister.php" style="text-decoration:none;" id="retour">Revenir en arrière</a><br /><br />

  </body>
  </html 
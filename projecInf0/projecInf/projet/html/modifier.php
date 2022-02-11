<?php
 $host = 'localhost';
 $dbname = 'projet';
 $username = 'root';
 $password = '';
 

 $objetPdo = new PDO("mysql:host=$host;dbname=$dbname","$username","$password");

 
 $pdoStat = $objetPdo->prepare('UPDATE produit SET referance=:referance, nom=:nom, prix=:prix, qtt=:qtt, caracteristique=:caracteristique, image=:image, id_cat=:id_cat  WHERE id_p=:num LIMIT 1');
 $pdoStat->bindValue(':num', $_POST['numProduit'], PDO::PARAM_STR);
 $pdoStat->bindValue(':referance', $_POST['ref'], PDO::PARAM_STR);
 $pdoStat->bindValue(':nom', $_POST['nompr'], PDO::PARAM_STR);
 $pdoStat->bindValue(':prix', $_POST['prixp'], PDO::PARAM_STR);
 $pdoStat->bindValue(':qtt', $_POST['quantite'], PDO::PARAM_STR);
 $pdoStat->bindValue(':caracteristique', $_POST['caracp'], PDO::PARAM_STR);
 $pdoStat->bindValue(':image', $_POST['ima'], PDO::PARAM_STR);
 $pdoStat->bindValue(':id_cat', $_POST['cat'], PDO::PARAM_STR);
 $Isok = $pdoStat->execute();

 if($Isok){
    $message = 'Les données du produit ont été mises a jour ';
  }else{
   $message = 'echec Les données du produit n\'ont pas été mises a jour ';
  }
 ?>
 <html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Modifier un produit</title>
    <link rel="stylesheet" href="../css/liste.css">
    
    
  </head>
  <body>
  <h1>Resultat de l'operation :</h1>
  <h4 id="msg"><?php echo $message; ?> </h4>
 <a href="lister.php" style="text-decoration:none;" id="retour">Revenir en arrière</a><br /><br />
  
  </body>
  </html 

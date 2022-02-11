<?php
 $host = 'localhost';
 $dbname = 'projet';
 $username = 'root';
 $password = '';


 $objetPdo = new PDO("mysql:host=$host;dbname=$dbname","$username","$password");
 
 $pdoStat = $objetPdo->prepare('SELECT * FROM produit WHERE id_p=:num');

 $pdoStat->bindValue(':num', $_GET['numProduit'], PDO::PARAM_INT);

 $exeIsok = $pdoStat->execute();
 $information = $pdoStat->fetch();
 require 'header.php';

 ?>

 <!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Commande client</title>
<link href="../css/form_commande.css" rel="stylesheet" type="text/css" />


</head>

<body>
<div class="forget">

<form  class=" for"  action="commander.php" method="post" >

<h2 >Votre Commande</h2>
<input type="hidden" name="numProduit" value="<?= $information['id_p']; ?>"/>
<input type="text" id="Nom_cl" name="clientn" placeholder="Entrez Votre Nom" /><br /><br />
<input type="text"  id="prenom_cl" name="clientp"  placeholder="Entrez Votre Prenom " /><br /><br />
<input type="text" id="Nom_p" name="prod" value="<?= $information['nom']; ?>" placeholder="Entre votre Nom" /><br /><br />
<input type="text" id="adresse_liv" name="clientad"  placeholder="Adresse de livraison" /><br /><br />
<input type="text" id="numero_CIN" name="clientcni"  placeholder="le numero de votre carte d'identité" /><br /><br />
<input type="text" id="numero_tel" name="clienttel"  placeholder="le numero de Telephone" /><br /><br />
<input type="text" id="email" name="clientem"  placeholder="Entrez votre adresse mail " /><br /><br />

<input type="submit" value="Commander" id="validate"  /><br /><br />
<a href="page-details.php?numProduit=<?= $information['id_p'] ?>" style="text-decoration:none;">Revenir en arrière</a><br /><br />



</form>
</div>
<?php require 'footer.php'; ?>
</body>
</html>

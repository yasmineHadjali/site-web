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
?>
 <!DOCTYPE html>

 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Modifier un produit</title>
<link href="../css/form_ajoute.css" rel="stylesheet" type="text/css" />


</head>

<body>
<div class="forget"  >

<form action="modifier.php" method="post">

<h2>Modifier un produit</h2>
        <input type="hidden" name="numProduit" value="<?= $information['id_p']; ?>"/>


<input type="text" id="referance" name="ref" value="<?= $information['referance']; ?>" placeholder="Entrez la Réferance du produit" /><br /><br />
<input type="text" id="nom" name="nompr" value="<?= $information['nom']; ?>" placeholder="Entrez le nom du produit" /><br /><br />
<input type="number"  id="id_cat" name="cat" value="<?= $information['id_cat']; ?>" placeholder="Entrez le numero du la marque " /><br /><br />
<input type="text" id="prix" name="prixp" value="<?= $information['prix']; ?>" placeholder="Entrez le prix du produit" /><br /><br />
<input type="text" id="qtt" name="quantite" value="<?= $information['qtt']; ?>" placeholder="Entrez le quantite du produit" /><br /><br />
<textarea id="caracteristique" type="text" value="<?= $information['caracteristique']; ?>" rows="4" cols="20" name="caracp" placeholder="Modifiez les Caracteristiques du produit" ></textarea><br /><br />
<input type="text" id="image" name="ima" value="<?= $information['image']; ?>" placeholder="Entrez l'url de l'image" /><br /><br />

<input type="submit" value="Modifier" id="validate"  /><br /><br />
<a href="lister.php" style="text-decoration:none;">Revenir en arrière</a><br /><br />



</form>
</div>

  </body>
 

</html>  
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ajouter un produit</title>
<link href="../css/form_ajoute.css" rel="stylesheet" type="text/css" />


</head>

<body>
<div class="forget"  >

<form action="ajouter.php" method="post" >

<h2 >Ajouter un produit</h2>
<input type="text" id="referance" name="ref" placeholder="Entrez la Réferance du produit" /><br /><br />
<input type="text" id="nom" name="nompr" placeholder="Entrez le nom du produit" /><br /><br />
<input type="number"  id="id_cat" name="cat" placeholder="Entrez le numero de la categorie " /><br /><br />
<input type="text" id="prix" name="prixp" placeholder="Entrez le prix du produit" /><br /><br />
<input type="text" id="qtt" name="quantite" placeholder="Entrez le quantite du produit" /><br /><br />
<textarea id="caracteristique" type="text" rows="4" cols="20" name="caracp" placeholder="Entrez les Caracteristiques du produit" ></textarea><br /><br />
<input type="text" id="image" name="ima" placeholder="Entrez l'url de l'image" /><br /><br />

<input type="submit" value="Envoyer" id="validate"  /><br /><br />
<a href="lister.php" style="text-decoration:none;">Revenir en arrière</a><br /><br />



</form>
</div>

</body>
</html>

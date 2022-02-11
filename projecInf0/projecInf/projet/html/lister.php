<?php
 $host = 'localhost';
 $dbname = 'projet';
 $username = 'root';
 $password = '';


 $objetPdo = new PDO("mysql:host=$host;dbname=$dbname","$username","$password");
 $produitParPage = 7;
 $produitTotalReq = $objetPdo->query('SELECT referance from produit');
 $produitTotal = $produitTotalReq->rowCount();
 $pagesTotales = ceil($produitTotal/$produitParPage);

 if (isset($_GET['page']) and !empty($_GET['page']) and ($_GET['page']) > 0 and ($_GET['page']) <=$pagesTotales){
  $_GET['page']=intval($_GET['page']);
  $pageCourante = $_GET['page'];
 }else{
  $pageCourante = 1;
 }
 $depart = ($pageCourante-1)*$produitParPage;
 
 $pdoStat = $objetPdo->prepare('SELECT `id_p`, `referance`, `nom`, `nom_cat`, `prix`, `qtt` FROM `produit` LEFT JOIN `categorie` on produit.id_cat=categorie.id_cat ORDER BY nom LIMIT '.$depart.','.$produitParPage);
 $executeIsok = $pdoStat->execute();
 $information = $pdoStat->fetchAll();
 
 

 

?>
 
<!DOCTYPE html>
 <html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Affichage des produits</title>
    <link href="../css/liste.css" rel="stylesheet" type="text/css" />
    
    
    
    
  </head>
   <body>
   <h1>Liste des produits</h1>
   <a href="form_ajouter.php"> <input type="submit" value="Ajouter un produit"   /> </a><br /><br />
   
  <table class="table table-striped">
   <thead>
    <tr>
      <th scope="col">REFERANCE</th>
      <th scope="col">NOM</th>
      <th scope="col">Categorie</th>
      <th scope="col">Quantité</th>
      <th scope="col">PRIX</th>
      <th scope="col">OPERATIONS</th>
      
    </tr>
  </thead>
  <tbody>

    

  <?php foreach ($information as $information): ?>
   <tr>

      <td>#<?= $information['referance'] ?></td>
      <td> <?= $information['nom'] ?></td>
      <td><?= $information['nom_cat'] ?></td>
      <td><?= $information['qtt'] ?></td>
      <td><?= $information['prix'] ?> DA</td>
      <td> <a href="supprimer.php?numProduit=<?= $information['id_p'] ?>"> <img src="../img/supprimer.png" id="img2" alt="supprimer"></a> <a href="form_modifier.php?numProduit=<?= $information['id_p'] ?>"> <img src="../img/modifier.png" id="img3" alt="modifier"></a></td>
    </tr>

<?php endforeach; ?>
   
  
  </tbody>
</table>

<h4>pages</h4>
<?php
for($i=1;$i<=$pagesTotales;$i++){
  if($i==$pageCourante){
echo $i.' ';
  }else{
    
    echo '<a href="lister.php?page='.$i.'">.' .$i. '.</a> ';
}
  }
?>
<div>
<a href="admin_espace.php" > <input type="submit" value="Fermer la page"   /> </a><br /><br />
</div>
  </body>
  </html 
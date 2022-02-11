<?php
 $host = 'localhost';
 $dbname = 'projet';
 $username = 'root';
 $password = '';


 $objetPdo = new PDO("mysql:host=$host;dbname=$dbname","$username","$password");
 $produitParPage = 7;
 $produitTotalReq = $objetPdo->query('SELECT id_com from commande');
 $produitTotal = $produitTotalReq->rowCount();
 $pagesTotales = ceil($produitTotal/$produitParPage);

 if (isset($_GET['page']) and !empty($_GET['page']) and ($_GET['page']) > 0 and ($_GET['page']) <=$pagesTotales){
  $_GET['page']=intval($_GET['page']);
  $pageCourante = $_GET['page'];
 }else{
  $pageCourante = 1;
 }
 $depart = ($pageCourante-1)*$produitParPage;
 
 $pdoStat = $objetPdo->prepare('SELECT * FROM commande ORDER BY id_com LIMIT '.$depart.','.$produitParPage);
 $executeIsok = $pdoStat->execute();
 $information = $pdoStat->fetchAll();
 
 

 

?>
 
<!DOCTYPE html>
 <html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Affichage des commandes</title>
    <link href="../css/liste.css" rel="stylesheet" type="text/css" />
    
    
    
    
  </head>
   <body>
   <h1>Liste des commandes</h1>
   
  <table class="table table-striped">
   <thead>
    <tr>
      <th scope="col">Commande N°</th>
      <th scope="col">Nom du produit</th>
      <th scope="col">Nom du client</th>
      <th scope="col">Prenom du client</th>
      <th scope="col">Adresse de livraison</th>
      <th scope="col">Numero de la C.N.I</th>
      <th scope="col">Numero de telephone</th>
      <th scope="col">Email</th>
      <th scope="col">OPERATIONS</th>
      
    </tr>
  </thead>
  <tbody>

    

  <?php foreach ($information as $information): ?>
   <tr>

      <td>#<?= $information['id_com'] ?></td>
      <td> <?= $information['Nom_p'] ?></td>
      <td><?= $information['Nom_cl'] ?></td>
      <td><?= $information['prenom_cl'] ?></td>
      <td><?= $information['adresse_liv'] ?> </td>
      <td><?= $information['numero_CIN'] ?> </td>
      <td><?= $information['numero_tel'] ?> </td>
      <td><?= $information['email'] ?> </td>
      <td> <a href="supprimer_commande.php?numCommande=<?= $information['id_com'] ?>"> <img src="../img/supprimer.png" id="img2" alt="supprimer"></a> </td>
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
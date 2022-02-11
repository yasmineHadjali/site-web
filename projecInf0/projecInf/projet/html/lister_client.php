<?php
 $host = 'localhost';
 $dbname = 'projet';
 $username = 'root';
 $password = '';


 $objetPdo = new PDO("mysql:host=$host;dbname=$dbname","$username","$password");
 $produitParPage = 7;
 $produitTotalReq = $objetPdo->query('SELECT id from users');
 $produitTotal = $produitTotalReq->rowCount();
 $pagesTotales = ceil($produitTotal/$produitParPage);

 if (isset($_GET['page']) and !empty($_GET['page']) and ($_GET['page']) > 0 and ($_GET['page']) <=$pagesTotales){
  $_GET['page']=intval($_GET['page']);
  $pageCourante = $_GET['page'];
 }else{
  $pageCourante = 1;
 }
 $depart = ($pageCourante-1)*$produitParPage;
 
 $pdoStat = $objetPdo->prepare('SELECT * FROM users ORDER BY nom LIMIT '.$depart.','.$produitParPage);
 $executeIsok = $pdoStat->execute();
 $information = $pdoStat->fetchAll();
 
 

 

?>
 
<!DOCTYPE html>
 <html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Liste de clients</title>
    <link href="../css/liste.css" rel="stylesheet" type="text/css" />
    
    
    
    
  </head>
   <body>
   <h1>Liste des clients</h1>
   
   
  <table class="table table-striped">
   <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Nom d'utilisateur</th>
      <th scope="col">Date de naissance</th>
      <th scope="col">email</th>
      <th scope="col">N°telephone</th>
      <th scope="col">OPERATIONS</th>
      
    </tr>
  </thead>
  <tbody>

    

  <?php foreach ($information as $information): ?>
   <tr>

      <td><?= $information['nom'] ?></td>
      <td><?= $information['prenom'] ?></td>
      <td> <?= $information['username'] ?></td>
      <td><?= $information['datenaiss'] ?></td>
      <td><?= $information['email'] ?></td>
      <td><?= $information['mobile'] ?></td>

      <td> <a href="supprimer_client.php?numClient=<?= $information['id'] ?>"> <img src="../img/supprimer.png" id="img2" alt="supprimer"></a> </td>
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
<?php
$host = 'localhost';
 $dbname = 'projet';
 $username = 'root';
 $password = '';


 $objetPdo = new PDO("mysql:host=$host;dbname=$dbname","$username","$password");

$pdoStat = $objetPdo->prepare('SELECT `id_p`, `referance`, `nom`, `image`, `prix`, `qtt` FROM `produit` WHERE id_cat=1 ORDER BY nom');
 $executeIsok = $pdoStat->execute();
 $information = $pdoStat->fetchAll();
 
 

 



 require 'header.php'; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil</title>
     <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="../css/style.css">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/all.min.css">
    <script src="http://code."></script>
    
</head>
<body>

    <section class="section-bg">
        <div class="container">
          <div class="row">
            <div class="col-x1-x2">
                 <div class="section-title">
                   </div>
                 </div>
                </div>

                 <div class="row">
  
                 <?php foreach ($information as $information): ?>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="single-product">
                            <div class="product-thumb">
                                 <img src="../img/<?= $information['image'] ?>" alt="">
                            </div>
                             <div class="product-title">
                                  <h3><?= $information['nom'] ?></h3>
                             </div>
                             <div class="product-prix">
                                 <h3><?= $information['prix'] ?>DA</h3>
                             </div>
                            <div class="product-btns">
                                <a href="page-details.php?numProduit=<?= $information['id_p'] ?>" class="btn-small mr-2">details</a>
                            </div>
                      </div>
                              </div>
                <?php endforeach; ?>
                              </div>
     </section>         
                                 <script src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
   
    <script src="../js/main.js"></script>
</body>
</html>

<?php require 'footer.php'; ?>
<?php 
 $host = 'localhost';
 $dbname = 'projet';
 $username = 'root';
 $password = '';
$objetPdo = new PDO("mysql:host=$host;dbname=$dbname","$username","$password");

 
$pdoStat = $objetPdo->prepare('SELECT `id_p`, `nom`, `caracteristique`, `prix`, `image` FROM produit WHERE id_p=:num LIMIT 1');

$pdoStat->bindValue(':num', $_GET['numProduit'], PDO::PARAM_INT);


$executeIsok = $pdoStat->execute();
$information = $pdoStat->fetch();


require 'header.php';
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/page-details.css">
    <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cabin|Herr+Von+Muellerhoff|Source+Sans+Pro: 400,900 & display = swap ">
    <title>Page details</title>
</head>
<body>
    <main>
        <section class="presentation">
            <div class="intreduction">
                <div class="intro-text">
                    <h1>La technologie pour vous</h1>
                    <p><?= $information['nom'] ?></p>
                
                    <ul class="cf-hero-bts-list">
                        <li>
                            
                            <p><?= $information['caracteristique'] ?></p>
                            
                        
                        </li>
                  
            
                </ul>
                
                </div>
                <div  class="cta">
                    <h2><?= $information['prix'] ?>DA</h2>
                    <button class="cat-select"> <a href="form_commander.php?numProduit=<?= $information['id_p'] ?>" class="btn-small mr-2">Acheter</a></button>
                    
                </div>
            </div>
            <div class="cover">
                <img src="../img/<?= $information['image'] ?>" alt="image du produit">
            </div>
        
        </section>
    </main>
    
</body>
</html>
<?php require 'footer.php'; ?>
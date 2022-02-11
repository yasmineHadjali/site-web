<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Page</title>
    <link rel="stylesheet" href="../css/espace_admin.css">
    
    
  </head>
  <body>

   
 
      <header>
     
      <div class="left_area">
        <h3><span>ESPACE ADMIN</span></h3>
      </div>
      <div class="right_area">
      <?php echo $_SESSION['username']; ?>
        <a href="logout.php" class="logout_btn">Deconnexion</a>
      </div>
    </header> 
  
    <input type="checkbox" id="chec">
      <label for="chec">
      <img src="../img/logo.png">
      </label>
    <nav>
        <ul>
           <li><a href="#"  onclick="closeForm1() ; closeForm2() ; closeForm3()  ; openForm()  " ><img src="../img/produit.png" id="img1">Gestion des produits </a></li>
          <li><a href="#" onclick="closeForm() ; closeForm2() ; closeForm3() ; openForm1()"><img src="../img/commande.png" id="img1">Gestion des commandes</a></li>
          <li><a href="#" onclick="closeForm() ; closeForm1() ; closeForm3() ; openForm2() "><img src="../img/client.jpg" id="img1">Gestion des clients</a></li>
          <li><a href="#" onclick="closeForm() ; closeForm1() ; closeForm2() ; openForm3() "><img src="../img/message.png" id="img1">Messages reçus</a></li>
       </ul>
    </nav>


    
<div class="formulaire_message" id="popupForm">


       <h1>Cliquer ici pour gerer les produits</h1>
       <a href="Lister.php" > <input type="button" value="Lister les produits"   /> </a><br /><br />
    
    </div>
    
<div class="formulaire_message" id="popupForm1">


       <h1>Cliquer ici pour gerer les commandes</h1>
       <a href="lister_commande.php" > <input type="button" value="Lister les commandes"   /> </a><br /><br />
    
    </div>
<div class="formulaire_message" id="popupForm2">


       <h1>Cliquer ici pour gerer les clients</h1>
       <a href="lister_client.php" > <input type="button" value="Lister les clients"   /> </a><br /><br />
    
    </div>

<div class="formulaire_message" id="popupForm3">


       <h1>Cliquer ici pour gerer la Messagerie</h1>
       <a href="lister_message.php" > <input type="button" value="Lister les message"   /> </a><br /><br />
    
    </div>
    
    
    
    
   
 <script>
function openForm() {
document.getElementById("popupForm").style.display = "block";
}
function closeForm() {
document.getElementById("popupForm").style.display = "none";
}
function openForm1() {
document.getElementById("popupForm1").style.display = "block";
}
function closeForm1() {
document.getElementById("popupForm1").style.display = "none";
}
function openForm2() {
document.getElementById("popupForm2").style.display = "block";
}
function closeForm2() {
document.getElementById("popupForm2").style.display = "none";
}
function openForm3() {
document.getElementById("popupForm3").style.display = "block";
}
function closeForm3() {
document.getElementById("popupForm3").style.display = "none";
}
</script>
  </body>
</html>
                           
<?php include('server.php');
  if(empty($_SESSION['username'])){
    header('location:login.php');
  }
 
  ?>
<?php require 'header.php'; ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet"type="text/css" href="../css/index.css">
</head>
<body>
   <div class="header-1">
   <h1>Page profile</h1>
   </div>
   <div class="content">
       <?php if (isset($_SESSION['success'])):?>
        <div class=" error success">
          <h3>
              <?php 
          echo  $_SESSION['success'];
          unset($_SESSION['success']);
          ?>
          </h3>
        </div>
        <?php endif ?>
        <div id="profile">
          <b id="welcome">soyez le bien venu dans notre site: <i><?php echo $_SESSION['username']; ?></i></b><br>
          <!--<b id="logout"><a href="login.php?logout='1'">logout</a></b>-->
		  <!-- <a href="déconnexion.php">déconnexion</a>-->
      <button type="submit" class="bt"><a href="déconnexion.php">déconnexion</a></button>
      <button type="submit" class="bt"><a href="panier.php">continuer</a></button>

		
         </div>
       
   </div>
</body>
</html>   

<?php require 'footer.php'; ?>
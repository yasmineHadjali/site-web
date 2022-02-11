<?php
$host = 'localhost';
 $dbname = 'projet';
 $username = 'root';
 $password = '';


 $objetPdo = new PDO("mysql:host=$host;dbname=$dbname","$username","$password");

$pdoStat = $objetPdo->prepare('SELECT `id_p`, `referance`, `nom`, `nom_cat`, `image`, `prix`, `qtt` FROM `produit` LEFT JOIN `categorie` on produit.id_cat=categorie.id_cat ORDER BY nom');
 $executeIsok = $pdoStat->execute();
 $information = $pdoStat->fetchAll();
 
 

 



 require 'header.php'; 

?>
<?php
//connection to database
  session_start();
  $connect = mysqli_connect('localhost','root','','projet');
  
  if(isset($_POST["add_to_cart"]))       //lutilisateur ajoute un produit
  {
    if(isset($_SESSION["shopping_cart"]))      //préparation du panier
    {
      $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");   //variable pour stocker les produits
      if(!in_array($_GET["id_p"], $item_array_id))
      {
        $count = count($_SESSION["shopping_cart"]);
  //recevoir les produits
          $item_array = array(
                    'item_id'       =>   $_GET["id_p"],
                    'product_img'     =>   $_POST["hidden_image"],
                    'item_name'     =>   $_POST["hidden_name"],
                    'item_price'    =>   $_POST['hidden_price'],
                    'item_quantity' =>   $_POST["quantity"]

          );
          $_SESSION["shopping_cart"][$count] = $item_array;
      }
      else
      {
        // si le produit est deja ajouter
        echo '<script>alert("produit déja ajouter ")</script>';
        echo '<script>window.location = "panier.php"</script>';
      }
    }
    else
    {
      //panier est vide
       $item_array = array(
                    'item_id'       =>   $_GET["id_p"],
                    'product_img'     =>   $_POST["hidden_image"],
                    'item_name'     =>   $_POST["hidden_name"],
                    'item_price'    =>   $_POST['hidden_price'],
                    'item_quantity' =>   $_POST["quantity"]

          );
         $_SESSION["shopping_cart"][0] = $item_array;
    }
  }
  //supprimer un produit 
  if(isset($_GET["action"]))
  {
    if($_GET["action"] == "delete")
    {
      foreach($_SESSION["shopping_cart"] as $key=>$value)
          {
            if($value["item_id"] == $_GET["id_p"])
            {
              unset($_SESSION["shopping_cart"][$key]);
              echo '<script>alert("produit supprimer")</script>';
              echo '<script>window.location="indax.php</script>';
            }
          }
    }
  }
  ?>
  <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="pharmacie">
    <meta name="keywords" content=" html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Pharmacie en ligne </title>

<!--poser des qst-->
<script type="text/javascript" src="../js/panier.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../css/panier.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css -->
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../bootstrap/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../bootstrap/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../bootstrap/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../bootstrap/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="../bootstrap/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../bootstrap/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../bootstrap/style.css" type="text/css">
	<link rel="stylesheet" href="../bootstrap/styleboutton.css" type="text/css">
	
	<!-- liste des produits -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		
		
		
		
	
</head>
<body>
<header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="index.php"><img src="image/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    
                </div>
            </div>
        </div>
    </header>

   
  
	<div id="all">
        <div id="content">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <!-- breadcrumb-->
                <nav aria-label="breadcrumb" style="height:70%;" >
                  <ol class="breadcrumb" style="height:70%;">
                    
                   <li aria-current="page" style="margin-left:10%;margin-right:5%;margin-top:0.8%;">    
				    <!-- farid-->
            <li  ><a href='login.php?deconnexion=true'><button type="submit"  class="boutton" style="width:100%;margin-left:205%;color:red;background-color:#F3F3F3;height:65%; margin-top:-150%;  padding-top:-20%;"><h4 style=" text-align: top; padding-top:-10%;"> Déconnexion</h4></button><br></a></li>
					
                  </ol>
                </nav>
              </div></div></div></div></div>
			
 

			
		
           <div class="container" style="width:700px;">  
		    <div style="clear:both"></div>  
                <br />  
                <h3> Details: <b style="color: red">Mon panier</b></h3>  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr> 
                              <th style="background-color:#E6E3E3;"> image</th> 
                               <th width="40%"style="background-color:#E6E3E3;">Nom du produit</th>  
                               <th width="10%"style="background-color:#E6E3E3;">Quantité</th>  
                               <th width="20%"style="background-color:#E6E3E3;">Prix</th>  
                               <th width="15%"style="background-color:#E6E3E3;">Total</th>  
                               <th width="5%"style="background-color:#E6E3E3;">Action</th>  
                          </tr>  
                             <?php 
                           if(!empty($_SESSION["shopping_cart"]))
                           {
                            $total = 0;
                            foreach($_SESSION["shopping_cart"] as $key => $value)
                           {

                             ?>
                          <tr> 
                               <td><img src="../img/<?php echo $value['product_img'];?>" style="width: 100px;"></td>
                             
                               <td><?php echo $value['item_name'];?></td>  
                               <td><?php echo $value['item_quantity']; ?></td>  
                               <td><?php echo $value['item_price'];?> DA</td>  
                               <td><?php echo number_format($value["item_quantity"] * $value["item_price"],2);?> DA</td>  
                               <td><a href="panier.php?action=delete&id_p=<?php  echo $value['item_id'];?>"><span class="btn btn-danger">supprimer</span></a></td>  
                          </tr>  
                          <?php $total = $total + ($value["item_quantity"] * $value['item_price']);
                        }
                        ?>
                           
                          <tr>  
                               <td colspan="4" align="right" style="background-color:#4A6AFA;">Total a payer</td>  
							    
                               <td align="right"><?php echo number_format($total);?> DA</td>  
							
                                 <td><form method="post">
							    <input type="submit"method="post" value="valider" id="valider" name="valider" class="btn btn-primary btn-lg" style="background-color:green; height:40px;">
							   </form>
							   </td>  
                          </tr> 
						  
						  
						  
						  
						  
						              
                          <?php } ?> 
                           
                     </table>
                     <h3 align="center">Catalogue de produits </h3><br />  
                     <?php
                    $qury = "SELECT * FROM produit ORDER BY id_p ASC";
                    $result = mysqli_query($connect,$qury);
                    if(mysqli_num_rows($result) >0)
                    {
                      while($row = mysqli_fetch_array($result))
                      {

                  ?>  
                  </div><center>
                <div class="col-md-4"> 
                     <form method="post" action="panier.php?action=add&id_p=<?php echo $row["id_p"];?>"   >  
                          <div style="border:1px solid #333; background-color:#E6E3E3; border-radius:5px; padding:16px;width:85%;" falign="center">  
                               <img src="../img/<?php echo $row["image"]; ?>" class="img-responsive" /><br />
                              <div class="panel panel-default" >
						<div class="panel-heading ">
                            <p style="font-size:20px; font-family:'Gothic A1';">détails du produit:</p>
                        </div>
						  <table class="table table-hover" id="task-table">
						  
						  <tr><h4 class="text-info"><td><u><b>nom: </b></u> </td><td><?php echo $row["nom"]; ?></td></h4></tr>
						  <tr><h4 class="text-info"><td><u><b>catégorie:</b></u></td><td> <?php echo $row["id_cat"]; ?></td></h4></tr>
						   <tr><h4 class="text-danger"><td><u><b>ancien prix:</b></u></td> <td><del><?php echo $row["prix"]; ?></del> DA</td></h4>  </tr>
						  <tr><h4 class="text-danger"><td><u><b>nouveau prix:</b></u></td> <td><?php echo $row["prix"]; ?> DA</td></h4>  </tr>
						  
						</table>
					</div> 
                               <input type="text" name="quantity" class="form-control" value="1" />
                            <input type="hidden" name="hidden_name" value="<?php echo $row['nom'] ?>" />
                            <input type="hidden" name="hidden_image" value="<?php echo $row['image'];?>">
                            <input type="hidden" name="hidden_price" value="<?php echo $row['prix'];?>">


                               <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value=" Ajouter aux panier" />  
                          </div>  
                     </form>  
                </div>  

				
                  <?php } } ?>
				 
          	  <?php	     
if(isset($_POST['valider'])){
	 echo"$total";
	 echo"$user";
   $query= "SELECT id FROM users WHERE email='$user'  ";

//execution de la requete
 $exec_requete = mysqli_query($connect,$query);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['id'];
		
 	 echo"$count";
	 
$date= date("Y-m-d H:i:s");	 

$qu = "INSERT INTO commande( ,, )  VALUES( '$user','$total','$total')"; 
$exec_requete = mysqli_query($connect,$qu);

if(!$exec_requete){
    echo '<script language="Javascript">
alert ("erreur!" )
     </script>';}
     else{
        echo '<script language="Javascript">
alert ("votre commande a été  validé" )
     </script>';
echo '<script>window.location="index.php"</script>';
     }		

}





 



?>
							   
							   
           </div>  
		   </center>
       
</body>
</html>
  
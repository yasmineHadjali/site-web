
<?php 
session_start();
//connect to database
$username="";
$email="";
$errors=array();
$link = mysqli_connect("localhost", "root", "", "projet");
if(isset($_POST['register'])){
   $nom=mysqli_real_escape_string($link,$_POST['nom']);
   $prenom=mysqli_real_escape_string($link,$_POST['prenom']);
   $username=mysqli_real_escape_string($link,$_POST['username']);
   $email=mysqli_real_escape_string($link,$_POST['email']);
   $password_1=mysqli_real_escape_string($link,$_POST['password_1']);
   $password_2=mysqli_real_escape_string($link,$_POST['password_2']);
   $mobile=mysqli_real_escape_string($link,$_POST['mobile']);
   $datenaiss=mysqli_real_escape_string($link,$_POST['datenaiss']);
   
   //ensure that form fields are filled proprelly

   /*if(empty($username)){
       array_push($errors,"username is required");//add error 
   }
    if(empty($email)){
    array_push($errors,"email is required");//add error 
}
if(empty($password_1)){
    array_push($errors,"password is required");//add error 
}
if($password_1 != $password_2){
    array_push($errors,"the two passwords do not match");//add error
}*/
//if there are no errors,save user  to data
if (count($errors) == 0){
    $password=md5($password_1);
    $sql =" INSERT INTO users(nom,prenom,username,email,password,mobile,datenaiss) VALUES ('$nom','$prenom','$username','$email','$password','$mobile','$datenaiss')";
    mysqli_query($link,$sql);
    $_SESSION['username']=$username;
    $_SESSION['success']="vous etes inscrit avec succes";
    header('location:index1.php');
}
}
if(isset($_POST['login'])){
    $username=mysqli_real_escape_string($link,$_POST['username']);
   $password_1=mysqli_real_escape_string($link,$_POST['password_1']);
   
   //ensure that form fields are filled proprelly

   /*if(empty($username)){
       array_push($errors,"username is required");//add error 
   }
    if(empty($password_1)){
    array_push($errors,"password is required");//add error 
}*/
if(count($errors)==0){
    $password_1 = md5($password_1);
    $query="SELECT * FROM users WHERE  username='$username' AND password='$password_1'";
    $result = mysqli_query($link,$query);
    if(mysqli_num_rows($result)==1){
        $_SESSION['username']=$username;
        $_SESSION['success']="Vous etes connecte";
        header('location:index1.php');
    }else{
        array_push($errors,"Ce compte n'existe pas");
    }
}
}
if(isset($_Get['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header('location:login.php');
  }
?>
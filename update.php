<!--Utilisé par profil.php, sert à la modification de mdp à coté de la bd-->
<?php include('server.php');

//Check if the user is logged, if not, he's redirected
if(!isset($_SESSION['username'])){
  $_SESSION['msg'] = "You must login to view this page";
  header("Location: login.php");
}

require("./bd.php");
$name = $_SESSION['username'];
$u_password = md5($_POST['signup_password']);
$connexion_bd = new bd();
$co = $connexion_bd->connection() or die("Error of connection");

//run the update request
$sql = "UPDATE user SET password = '$u_password' WHERE username = '$name'";
$res = mysqli_query($co,$sql)or die("erreur requete");
//Then redirect
header("Location:./index.php");

?>

<?php
session_start();
require_once('class/user.php');

$idasupr = $_GET['id'];
$iduser = $_SESSION['id'];

$fichier = "uploads/$nom1";
$delphoto = new user;
$delphoto->photoinfo($idasupr);
unlink($fichier);
$delphoto->delphoto($idasupr);
header("Location: profil.php?id=$iduser");
?>
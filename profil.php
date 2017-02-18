<?php
require_once('includes/navbar.php');
$ipaddress = $_SERVER['REMOTE_ADDR'];
if(!empty($_SESSION)){

$iduser = $_SESSION['id'];
}else{
    $iduser = NULL;
}

?>
<div class="profil">
    <div class="jumbotron">
        <center>Voici tout vos postes </center> <br>
        
        
<?php $user->getUserLastUpload($iduser, $ipaddress); ?>
          
                   

    </div>
</div>
<script src="js/inputfile.js"></script>
</body>
</html>
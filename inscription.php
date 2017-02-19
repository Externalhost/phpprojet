<?php
require_once('class/dbset.php');
require_once('includes/navbar.php');
$bdd = new bdd;

$good = false;
if (!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password'])) {



$nom = htmlentities($_POST['pseudo']);
$email = htmlentities($_POST['email']);
$password = htmlentities($_POST['password']);


$pwcrypt = crypt($password, '$2a$07$projetphp8gagpicturehosting$');

$bdd->connectpdo();
$stmt = $dbh->prepare("INSERT INTO users (id, pseudo, pasword, email) VALUES (NULL, :nom, :password, :email);");
$arg=[
    ':nom' => $nom,
    ':password' => $pwcrypt,
    ':email' => $email
];
$stmt->execute($arg);


$good = true;
}
?>
<div class="inscription">
            <div class="jumbotron">
                <center>Selectionne donc une ou plusieur image </center> <br>
                <form method="POST" action="">
                    <!-- COMPONENT START -->
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Pseudo" name="pseudo" aria-describedby="basic-addon2">
                        <span class="input-group-addon" id="basic-addon2">Pseudo</span>
                        
                    </div>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Votre email" name="email" aria-describedby="basic-addon2">
                        <span class="input-group-addon" id="basic-addon2">Email</span>
                        
                    </div>
                    <div class="input-group">
                        <input type="password" class="form-control" placeholder="mot de passe" name="password" aria-describedby="basic-addon2">
                        <span class="input-group-addon" id="basic-addon2">Password</span>
                        
                    </div>


                   
            <!-- COMPONENT END -->
            <div class="form-group">
                <button type="submit" class="btn btn-success pull-right" >Submit</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
            </form>

            <?php
            if($good == false){
                echo "<center> Tout les champs sont obligatoire !</center>";
            }else{
                echo "<center> <h2>Vous etes correctement inscrit <br></h2></center>";
            }

            ?>

        </div>


    </div>

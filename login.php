<?php

require_once('class/dbset.php');
require_once('includes/navbar.php');
$bdd = new bdd;
$bdd->connectpdo();

if(!empty($_SESSION)){
        header('Location:index.php');
    }
// Traiter le post
if (!empty($_POST) ) {
    
$password = htmlentities($_POST['password']);
$pseudo = htmlentities($_POST['pseudo']);

$pwcrypt = crypt($password, '$2a$07$projetphp8gagpicturehosting$');


    $stmt = $dbh->prepare('SELECT * FROM users WHERE pseudo = :pseudo AND pasword = :password');
    $arg=[
        ':pseudo' => $pseudo,
        ':password' => $pwcrypt
    ];
    $stmt->execute($arg);
        


    
    $users = $stmt->fetchAll();
    //$users[0]['count'];
    // Tester via count() le nombre d'éléments dans le tableau
    if (count($users) > 0) {
        // Si l'utilisateur existe -> créer la variable $_SESSION['connected'] avec un bool
        $_SESSION['connected'] = true;
        $_SESSION['id'] = $users[0]['id'];
        header('Location:index.php');
    }
}
?>


        <div class="login">
            <div class="jumbotron">
                <center>Selectionne donc une ou plusieur image </center> <br>
                <form method="POST" action="#">
                    <!-- COMPONENT START -->
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Pseudo" name="pseudo" aria-describedby="basic-addon2">
                        <span class="input-group-addon" id="basic-addon2">Pseudo</span>
                        
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
        </div>


    </div>
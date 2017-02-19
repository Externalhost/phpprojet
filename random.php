<?php
require_once('includes/navbar.php');
require_once('class/user.php');

$random = new user;
$random->randomphoto();

if(!empty($idrandomphoto)){
           $db = 'mysql:dbname=8gag;host:127.0.0.1';
$user = 'root';
$password = '';
    try {
     $dbh = new PDO($db, $user, $password);
} catch (Exception $e){
    echo $e->getMessage();
}
$req = $dbh->prepare('SELECT * FROM photos WHERE id = :id');
$arg=[
    ':id' => $idrandomphoto
];
$req->execute($arg);
while ($randomhpoto = $req->fetch()){

$namerandomphoto = $randomhpoto['nom'];
}
$divrandom = "<img src='uploads/$namerandomphoto'>";
}else{
$divrandom = "Aucune photo n'est en ligne";
}
?>

<div class="lastupload">
    <div class="jumbotron">
        <center><?php echo $divrandom; ?></center> <br>


    </div>
</div>
</body>
</html>
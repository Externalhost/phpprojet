<?php


class user{



public function getUserInfo($id){

$db = 'mysql:dbname=8gag;host:127.0.0.1';
$user = 'root';
$password = '';
    try {
     $dbh = new PDO($db, $user, $password);
} catch (Exception $e){
    echo $e->getMessage();
}


$stmt = $dbh->prepare('SELECT * FROM users WHERE id = :id');
$arg=[
        ':id' => $id
    ];
$stmt->execute($arg);
while ($result = $stmt->fetch()){


global $id;
$id = $result['id'];

global $pseudo;
$pseudo = $result['pseudo'];

global $passwd;
$passwd = $result['pasword'];

global $email;
$email = $result['email'];


        }
    }

public function getUserLastUpload($id_user, $ipadress){
$db = 'mysql:dbname=8gag;host:127.0.0.1';
$user = 'root';
$password = '';
    try {
     $dbh = new PDO($db, $user, $password);
} catch (Exception $e){
    echo $e->getMessage();
}

$stmt = $dbh->prepare('SELECT * FROM photos WHERE userid = :id_user OR ipadress = :ipadress');
$arg=[
    ':id_user' => $id_user,
    ':ipadress' => $ipadress
];
$stmt->execute($arg);
while ($result = $stmt->fetch()){

global $id_photo;
$id_photo = $result['id'];

global $nom;
$nom = $result['nom'];

global $userid;
$userid = $result['userid'];

global $datee;
$datee = $result['datee'];

global $ipadress;
$ipadress = $result['ipadress'];

echo "<div class='img'>
        <img src='uploads/$nom'>
            <a href='del.php?id=$id_photo' class='btn btn-danger' role='button' >X</a>
            <a href='uploads/$nom' class='btn btn-danger' role='button' target='_blank' id='view'>View</a><br>
            <p>Postée le $datee</p>
        </div>";
        }
    }

public function upload($nom,  $userid){
$db = 'mysql:dbname=8gag;host:127.0.0.1';
$user = 'root';
$password = '';
    try {
     $dbh = new PDO($db, $user, $password);
} catch (Exception $e){
    echo $e->getMessage();
}
date_default_timezone_set('Europe/Paris');
$date = date('j m Y');
$ipaddress = $_SERVER['REMOTE_ADDR'];
$stmt = $dbh->prepare('INSERT INTO photos(id, nom, userid, datee, ipadress) Values(NULL, :nom, :userid, :datee, :ipadress)');
$arg=[
    ':nom' => $nom,
    ':userid' => $userid,
    ':datee' => $date,
    ':ipadress' => $ipaddress
];
$stmt->execute($arg);
       


}

public function getFiveLastUpload(){
    $db = 'mysql:dbname=8gag;host:127.0.0.1';
$user = 'root';
$password = '';
    try {
     $dbh = new PDO($db, $user, $password);
} catch (Exception $e){
    echo $e->getMessage();
}

$stmt = $dbh->prepare('SELECT * FROM photos ORDER BY id DESC LIMIT 7;');
$stmt->execute();
while ($result = $stmt->fetch()){

global $id_photo1;
$id_photo1 = $result['id'];

global $nom1;
$nom1 = $result['nom'];

global $userid1;
$userid1 = $result['userid'];

global $datee1;
$datee1 = $result['datee'];

global $ipadress1;
$ipadress1 = $result['ipadress'];

echo "<div class='img'>
            <img src='uploads/$nom1'>
             <center><a href='uploads/$nom1' class='btn btn-danger' role='button' target='_blank'>View</a><br></center>
            <p>Postée le $datee1</p>
       </div>";
}
}

public function randomphoto(){
       $db = 'mysql:dbname=8gag;host:127.0.0.1';
$user = 'root';
$password = '';
    try {
     $dbh = new PDO($db, $user, $password);
} catch (Exception $e){
    echo $e->getMessage();
}

$stmt = $dbh->prepare('SELECT * FROM photos;');
$stmt->execute();
$random = $stmt->fetchAll();
if(count($random) > 0){
$max = count($random);

global $idrandomphoto;
$idrandomphoto = mt_rand(1, $max);
}

}
public function photoinfo($idphotoinfo){
               $db = 'mysql:dbname=8gag;host:127.0.0.1';
$user = 'root';
$password = '';
    try {
     $dbh = new PDO($db, $user, $password);
} catch (Exception $e){
    echo $e->getMessage();
}
$stmt = $dbh->prepare('SELECT * FROM photos WHERE id = :id');
$arg=[
    ":id" => $idimgtodel
];
while ($result = $stmt->fetch()){

global $id_photo1;
$id_photo1 = $result['id'];

global $nom1;
$nom1 = $result['nom'];

global $userid1;
$userid1 = $result['userid'];

global $datee1;
$datee1 = $result['datee'];

global $ipadress1;
$ipadress1 = $result['ipadress'];
}



}
public function delphoto($idimgtodel){
           $db = 'mysql:dbname=8gag;host:127.0.0.1';
$user = 'root';
$password = '';
    try {
     $dbh = new PDO($db, $user, $password);
} catch (Exception $e){
    echo $e->getMessage();
}
$stmt = $dbh->prepare('DELETE FROM photos WHERE id = :id');
$arg=[
    ":id" => $idimgtodel
];
$stmt->execute($arg);


}

}


?>
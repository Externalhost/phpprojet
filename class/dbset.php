<?php
class bdd{
    
    public function connectpdo(){
global $dbh;
$db = 'mysql:dbname=8gag;host:127.0.0.1';
$user = 'root';
$password = '';
    try {
     $dbh = new PDO($db, $user, $password);
} catch (Exception $e){
    echo $e->getMessage();
}

}


}
?>
<?php
$connexion = new PDO('mysql:host=localhost;dbname=test','root','' );
if(!$connexion){
    die("erreur à la connexion");
}
if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $requet = $connexion->prepare('DELETE  FROM info WHERE id=?');
    $requet->execute(array($id));
    if($requet){
        echo "la suppression a été effectué";
    }else{
        die("erreur");                                                                            
    }
}



?>
<?php
$connexion = new PDO('mysql:host=localhost;dbname=test','root','' );
if(!$connexion){
    die("erreur à la connexion");
}
if(!empty($_GET['id'])){
    $id= $_GET['id'];
    $select = $connexion->prepare('SELECT * FROM info WHERE id=?');
    $select->execute(array($id));
    if($select){
        echo "la selection a été reussie";
        $resultat = $select->fetchAll();
        //var_dump($resultat);
        if(!empty($_POST['text'])){
            $test = $_POST['text'];
            $modification= $connexion->prepare("UPDATE info SET text ='$test' WHERE id=? ");
            $modification->execute(array($id));
            if($modification){
                echo "modification reussie";
            }else{
                echo "une erreu est survenue";
            }
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification</title>
</head>
<body>
<a href="liste.php">les listes</a>
    <a href="index.php">Accueil</a>
    <?php foreach($resultat as $value):  ?>
    <form action="" method="post">
        <input type="text" name="text" id="text" value="<?php echo $value['text']; ?>"><br>
        <input type="submit" value="connexion"><br>
    </form>
    <?php endforeach;   ?>
</body>
</html>
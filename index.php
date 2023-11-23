<?php
$connexion = new PDO('mysql:host=localhost;dbname=test','root','' );
if(!$connexion){
    die("erreur à la connexion");
}
if(isset($_POST['text'])){
    $text = $_POST['text'];

$requet = $connexion->prepare('INSERT INTO info(text) VALUES(?)' );
$requet->execute(array($text));
if(!$requet){
    die ("erreur");
}else{
    echo "insertion reussie";
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
    <a href="liste.php">les listes</a>
    <a href="index.php">Accueil</a>
    <form action="" method="post">
        <input type="text" name="text" id="text" placeholder="entrer du texte" required><br>
        <input type="submit" value="Envoyer"><br>
    </form>
</body>
</html>
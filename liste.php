<?php
$connexion = new PDO('mysql:host=localhost;dbname=test','root','' );
if(!$connexion){
    die("erreur à la connexion");
}
$recup = $connexion->prepare('SELECT * FROM info ');
$recup ->execute();
if($recup){
    $affiche = $recup->fetchAll();
    // var_dump($affiche);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>titre</th>
            <th>Actions</th>
            
        </tr>
        <?php foreach($affiche as $affiches):  ?>
        <tr>
            
            <td><?php echo $affiches['text'];   ?></td>
            <td><a href="modifier.php?id=<?php echo $affiches['id']; ?>">modifier</a></td>
            <td><a href="supprimer.php?id=<?php echo $affiches['id'];  ?>">supprimer</a></td>
        </tr>
        <?php endforeach;  ?>
    </table>
</body>
</html>


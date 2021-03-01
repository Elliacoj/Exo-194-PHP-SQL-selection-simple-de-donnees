<?php

/**
 * 1. Importez le fichier SQL se trouvant dans le dossier SQL.
 * 2. Connectez vous à votre base de données avec PHP
 * 3. Sélectionnez tous les utilisateurs et affichez toutes les infos proprement dans un div avec du css
 *    ex:  <div class="classe-css-utilisateur">
 *              utilisateur 1, données ( nom, prenom, etc ... )
 *         </div>
 *         <div class="classe-css-utilisateur">
 *              utilisateur 2, données ( nom, prenom, etc ... )
 *         </div>
 * 4. Faites la même chose, mais cette fois ci, triez le résultat selon la colonne ID, du plus grand au plus petit.
 * 5. Faites la même chose, mais cette fois ci en ne sélectionnant que les noms et les prénoms.
 */
require "./Classes/DB.php";
$db = DB::getInstance();


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<?php
    $search = $db->prepare("SELECT * FROM user");

    $state = $search->execute();

    echo "<div class='container'>";
    if($state) {
        foreach ($search->fetchAll() as $user) {
            echo "<div class='user'>Utilisateur $user[id]: $user[prenom] $user[nom], habbitant $user[rue] numéro $user[numero] à $user[ville] 
                  en $user[pays] avec cette adresse mail: $user[mail]. </div>";
        }
    }
    echo "</div>";

    echo "<br>";

    $search = $db->prepare("SELECT * FROM user ORDER BY id DESC");

    $state = $search->execute();

    echo "<div class='container'>";
    if($state) {
        foreach ($search->fetchAll() as $user) {
            echo "<div class='user'>Utilisateur $user[id]: $user[prenom] $user[nom], habbitant $user[rue] numéro $user[numero] à $user[ville] 
                  en $user[pays] avec cette adresse mail: $user[mail]. </div>";
        }
    }
    echo "</div>";

    echo "<br>";

    $search = $db->prepare("SELECT * FROM user");

    $state = $search->execute();

    echo "<div class='container'>";
    if($state) {
        foreach ($search->fetchAll() as $user) {
            echo "<div class='user'>Utilisateur $user[id]: $user[prenom] $user[nom]</div>";
        }
    }
    echo "</div>";
?>
</body>
</html>

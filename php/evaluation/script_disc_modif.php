<?php

// On se connecte à la BDD via notre fichier db.php :
require "db.php";
$db = connexionBase();

// On récupère l'ID passé en paramètre :
$id = $_GET["id"];

// On crée une requête préparée avec condition de recherche :
$requete = $db->prepare(
    "SELECT * 
    FROM disc
    JOIN artist ON disc.artist_id=artist.artist_id
    WHERE disc.disc_id=?"
);

// on ajoute l'ID du disque passé dans l'URL en paramètre et on exécute :
$requete->execute(array($id));

// on récupère le résultat :
$myArtist = $requete->fetch(PDO::FETCH_OBJ);

// on clôt la requête en BDD
$requete->closeCursor();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="p-3">

<h1> Saisie d'un nouvel artist</h1>

<a href="dics.php" class="btn bg-primary text-white my-4"> Retour aux disques</a>

<br>
<br>

<form action="script_disc_ajout.php" method="post" enctype="multipart/form-data">

                <label for="titre_disque">Titre du disque :</label><br>
                <input type="text" name="titre_disque" id="titre_disque" value="<?= $myArtist->disc_title ?>">
                <br><br>

                <label for="annee_disque">Année du disque :</label><br>
                <input type="number" name="annee_disque" id="annee_disque" value="<?= $myArtist->disc_year ?>">
                <br><br>

                <label for="photo">Image du disque :</label><br>
                <img src="../jaquettes/<?= $myArtist->disc_picture ?>" alt="<?= $myArtist->disc_picture ?>" />
                <br><br>

                <label for="label_disque">Label du disque :</label><br>
                <input type="text" name="label_disque" id="label_disque" value="<?= $myArtist->disc_label ?>">
                <br><br>


                <label for="genre_disque">Genre du disque :</label><br>
                <input disabled type="text" name="genre_disque" id="genre_disque" value="<?= $myArtist->disc_genre ?>">
                <br><br>

                <label for="prix_disque">Prix du disque :</label><br>
                <input type="number" name="prix_disque" id="prix_disque" value="<?= $myArtist->disc_price ?>">
                <br><br>
                


                <label for="nom_artiste">Nom de l'artiste :</label><br>
                <select name="nom_artiste" id="nom_artiste">
                    <option value=0>--Choisir un artiste--</option>
                    <option value=1>Neil Young</option>
                    <option value=2>YES</option>
                    <option value=3>Rolling Stones</option>
                    <option value=4>Queens of the Stone Age</option>
                    <option value=5>AC/DC</option>
                    <option value=6>Marillion</option>
                    <option value=7>Bob Dylan</option>
                    <option value=8>Fleshtones</option>
                    <option value=9>The Clash</option>
            </select>
            <br><br>
               
            <a href="disc_detail.php" class="btn bg-primary text-white my-4">Modifier</a>
            <input tupe="submit" value="Ajouter" class="btn bg-primary text-white my-4">
            <input tupe="submit" value="Ajouter" class="btn bg-primary text-white my-4">

    </form>
</body>
</html>
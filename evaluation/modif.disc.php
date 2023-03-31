<?php
    include 'header.php';
?>
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

// on récupère le (et seul) résultat :
$myArtist = $requete->fetch(PDO::FETCH_OBJ);

// on clôt la requête en BDD
$requete->closeCursor();



?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

   
    <title>Disque ajout</title>
  
</head>

<body>

<form class="container mt-3" action="script_disc_modif.php?id=<?=$myArtist->disc_id?>" method="POST" enctype="multipart/form-data">
        <h1>Modifier un vinyle</h1>
        <fieldset>
            <div class="input-group mt-3 mb-4">
                <span class="input-group-text" id="Titre">Titre</span>
                <input type="text" class="form-control" placeholder="" aria-label="" value="<?=$myArtist->disc_title?>" aria-describedby="Titre" name="title"> 
            </div>
            <div class="input-group">
                <span class="input-group-text" id="Artist" name="artist">Artiste</span>
              
                <select class="form-control" id="exampleFormControlSelect1">
                <label for="nom_artiste">Nom de l'artiste :</label><br>
            <option value="<?= $myArtist->artist_id ?>"><?= $myArtist->artist_name ?></option>
            <option value=1>Neil Young</option>
            <option value=2>YES</option>
            <option value=3>Rolling Stones</option>
            <option value=4>Queens of the Stone Age</option>
            <option value=5>Serge Gainsbourg</option>
            <option value=6>AC/DC</option>
            <option value=7>Marillion</option>
            <option value=8>Bob Dylan</option>
            <option value=9>Fleshtones</option>
            <option value=10>The Clash</option>
        </select>
            </div>
            </select>
            <div class="input-group mt-4 mb-4">
                <span class="input-group-text" id="annee">Année</span>
                <input type="text" class="form-control" placeholder="" aria-label="" value="<?=$myArtist->disc_year?>" aria-describedby="Année" name="y">
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text" id="Genre">Genre</span>
                <input type="text" class="form-control" placeholder="" aria-label="" value="<?=$myArtist->disc_genre?>" aria-describedby="Genre" name="genre">
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text" id="label">Label</span>
                <input type="text" class="form-control" placeholder="" aria-label="" value="<?=$myArtist->disc_label?>" aria-describedby="label" name="lbl">
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text" id="Prix">Prix</span>
                <input type="text" class="form-control" placeholder="" aria-label="" value="<?=$myArtist->disc_price?>" aria-describedby="Prix" name="price">
            </div>
            <div>
                <p>Jaquette</p>
                 
                <img src="../jaquettes/<?= $myArtist->disc_picture ?>" alt="picture" class="rounded float-left img-fluid mb-3"> 
                <input for="insertPicture" type="file" class="btn btn-light form-control-file mx-3" name="pics" id="insertPicture"> 
                <div class="d-flex">
                  
                    <button type="submit" title="Modifier" alt="Modifier" class="btn btn-primary btn-sm mx-1 mt-3 mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                                </svg></button>
                   
                    <a href="discs.php"><button type="button" title="Retour" alt="Retour" class="btn btn-warning btn-sm mx-1 mt-3 mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-return-left text-light fw-bold" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                                </svg></button></a>
                </div> 
            </div>
        </fieldset>
    </form>

   
</body>

</html>
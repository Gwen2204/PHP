<?php

include 'header.php';
include 'db.php';

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Disque ajout</title>
</head>

<body>   
<div class="container mt-3">
<h1>Ajouter un vinyle</h1>
<br>
<form action="script_disc_ajout.php" method="post" enctype="multipart/form-data">
            <label>Titre</label>
            <input type="text" class="form-control" name="title" placeholder="Saisir le titre"><br>
            <label>Artist</label>
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
            </select><br>
            <input type=" text" class="form-control" name="artist" placeholder="Saisir le nom de l'artist"><br>
            <label>Année</label>
            <input type="text" class="form-control" name="year" placeholder="Saisir l'année"><br> 
            <label>Label</label>
            <input type=" text" class="form-control" name="label" placeholder="Universal,)"><br>
            <label>Prix</label>
            <input type=" text" class="form-control" name="price" placeholder="Saisir le prix"><br>
            <label>Jaquette</label><br>
            <label for="insertPicture"></label>
            <input type="file" class="form-control-file" id="insertPicture" name="pics"><br><br>
            <div class="d-flex">
                <button type="submit" class="btn btn-success mb-5 mx-1 btn-sm "><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-save2" viewBox="0 0 16 16">
                    <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v4.5h2a.5.5 0 0 1 .354.854l-2.5 2.5a.5.5 0 0 1-.708 0l-2.5-2.5A.5.5 0 0 1 5.5 6.5h2V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z"/>
                </svg></button>
                <a href="discs.php"<button type="button" class="btn btn-warning mx-1 mb-5 btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-return-left text-light fw-bold" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                        </svg></button></a>
            </div> 
        </form>
    </div>

    </body>
</html>
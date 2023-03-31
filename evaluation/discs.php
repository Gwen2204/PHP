<?php
include 'header.php';
?>
<?php

// on importe le contenu du fichier "db.php"
include('db.php');
// on exécute la méthode de connexion à notre BDD
$db = connexionBase();
// on lance une requête pour chercher toutes les fiches d'disces
$requete = $db->query("SELECT * FROM disc JOIN artist ON disc.artist_id=artist.artist_id");
// on récupère tous les résultats trouvés dans une variable
$tableau = $requete->fetchAll(PDO::FETCH_OBJ);
// on clôt la requête en BDD
$requete->closeCursor();
//compter les lignes du tableau
$nb ="La liste des disques (" . count($tableau) . ")";

?>

<body class="px-5">

<div class="d-flex mx-6 my-2 justify-content-between">
<div>
<h1 class="px-5">
<?= $nb ?>
</h1>
</div>
</div>

<div class="row px-3">

<?php foreach ($tableau as $disc): ?>


<div class="col-6 mx-6">

<div class="d-flex mx-6 my-2" style="height: 265px;">

<div>
<img class="p-3" style="height: 265px" src="./jaquettes/<?= $disc->disc_picture ?>">
</div>

<div class="p-3" style="height: 265px">
<a class="font-weight-bold">Titre :
<?= $disc->disc_title ?>
</a><br>
<a class="font-weight-bold">Artiste :
<?= $disc->artist_name ?>
</a><br>
<a class="font-weight-bold">Label :</a>
<?= $disc->disc_label ?><br>
<a class="font-weight-bold">Year :</a>
<?= $disc->disc_year ?><br>
<a class="font-weight-bold">Genre :</a>
<?= $disc->disc_genre ?><br>

<br><br>
<a href="disc_detail.php?id=<?= $disc->disc_id ?>"> <button type="button" title="Détails" alt="Détails" class="btn btn-sm btn-outline-success btndisc mx-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
<path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
<path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
</svg></button></a>




</div>
</div>

</div>
<?php endforeach; ?>

</div>

</body>

<?php
include 'footer.php';
?>  
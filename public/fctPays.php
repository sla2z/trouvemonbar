<!DOCTYPE html>
 <head>
   <link rel="stylesheet" href="presentation_pages.css" type="text/css">
   <link rel="stylesheet" href="tableau.css" type="text/css">
    <meta charset="utf-8" />
 </head>

 <?php
    require '../vendor/autoload.php';
    require '../src/User/Pays.php';
    require '../src/User/PaysRepository.php';
    require '../src/User/Ville.php';
    require '../src/User/VilleRepository.php';
    require '../src/User/Site_touristique.php';
    require '../src/User/Site_touristiqueRepository.php';


    //postgres
    $dbName = getenv('DB_NAME');
    $dbUser = getenv('DB_USER');
    $dbPassword = getenv('DB_PASSWORD');
    $connection = new PDO("pgsql:host=postgres user=$dbUser dbname=$dbName password=$dbPassword");

    $paysRepository = new \User\PaysRepository($connection);
    $payss = $paysRepository->fetchAll();
 $villeRepository = new \User\VilleRepository($connection);
 $villes = $villeRepository->fetchAll();
 
 ?>
<html>
  <head>
    <title>
      <?php echo $_POST['recherche_pays']; ?>
    </title>
  </head>
  <body>

    
    <nav>
      <ul>
	<li><a href="page_accueil.html">Accueil</a></li>
	<li><a href="recherche.html">Recherche destination</a></li>
	<li><a href="formulaire_contact.html">Contact</a></li>
      </ul>
    </nav>

    <h1>Quelques informations :</h1>
    <p>
      <table class="table table-bordered table-hover table-striped">
        <thead style="font-weight: bold">
          <td>Nom du Pays</td>
          <td>Code ISO</td>
          <td>Devise</td>
          <td>Langue</td>
	  <td>Capitale</td>
	  <td>Continent</td>
        </thead>
        <?php /** @var \User\User $user */
              foreach ($payss as $pays) : ?>
        <tr>
          <td><?php if ($pays->getNom_p()==$_POST['recherche_pays']) echo $pays->getNom_p() ?></td>
          <td><?php if ($pays->getNom_p()==$_POST['recherche_pays']) echo $pays->getCode_p() ?></td>
          <td><?php if ($pays->getNom_p()==$_POST['recherche_pays']) echo $pays->getDevise() ?></td>
          <td><?php if ($pays->getNom_p()==$_POST['recherche_pays']) echo $pays->getLangue() ?></td>
	  <td><?php if ($pays->getNom_p()==$_POST['recherche_pays']) echo $pays->getCapitale() ?></td>
	  <td><?php if ($pays->getNom_p()==$_POST['recherche_pays']) echo $pays->getContinent() ?></td>
	  <?php endforeach; ?>
	</tr>
      </table>
      </br>
      Les villes à destination touristique de ce pays :</br></br>
      
      <?php foreach ($villes as $ville) : ?>
	<?php if ($ville->getNom_p()==$_POST['recherche_pays']) echo $ville->getNom_v() ?>
	<?php endforeach; ?> </br></br>
	
    </p>
  </body>
</html>
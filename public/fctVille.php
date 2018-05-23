<!DOCTYPE html>
 <head>
    <link rel="stylesheet" href="presentation_pages.css" type="text/css">
<link rel="stylesheet" href="tableau.css" type="text/css">
    <meta charset="utf-8" />
    <title>Resultat de ma recherche</title>
  </head>
<?php
require '../vendor/autoload.php';
require '../src/User/Ville.php';
   require '../src/User/VilleRepository.php';
   require '../src/User/Site_touristique.php';
    require '../src/User/Site_touristiqueRepository.php';

//postgres
$dbName = getenv('DB_NAME');
$dbUser = getenv('DB_USER');
$dbPassword = getenv('DB_PASSWORD');
$connection = new PDO("pgsql:host=postgres user=$dbUser dbname=$dbName password=$dbPassword");

$villeRepository = new \User\VilleRepository($connection);
   $villes = $villeRepository->fetchAll();
$stRepository = new \User\Site_touristiqueRepository($connection);
$sts = $stRepository->fetchAll();
?>
<html>
<head>
	<title>
		<?php echo $_POST['recherche_ville']; ?>
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
              <td>Nom de la ville</td>
              <td>Nom du pays</td>
              <td>Population</td>
              <td>Superficie</td>
        </thead>
            <?php /** @var \User\User $user */
		  foreach ($villes as $ville) : ?>
            <tr>
              <td><?php if ($ville->getNom_v()==$_POST['recherche_ville']) echo $ville->getNom_v() ?></td>
              <td><?php if ($ville->getNom_v()==$_POST['recherche_ville']) echo $ville->getNom_p() ?></td>
              <td><?php if ($ville->getNom_v()==$_POST['recherche_ville']) echo $ville->getPopulation() ?></td>
              <td><?php if ($ville->getNom_v()==$_POST['recherche_ville']) echo $ville->getSuperficie() ?></td>
	      <?php endforeach; ?>
	    </tr>
	  </table>
	 </br>
      Les sites à destination touristique contenus dans cette ville :</br></br>
      
      <?php /** @var \User\User $user */
              foreach ($sts as $st) : ?>
	<?php if ($st->getNom_v()==$_POST['recherche_ville']) echo $st->getNom_st() ?>
	<?php endforeach; ?>
 
	</p>
	
</body>
</html>
<?php
require '../vendor/autoload.php';
include('menu.php');
//postgres
$dbName = getenv('DB_NAME');
$dbUser = getenv('DB_USER');
$dbPassword = getenv('DB_PASSWORD');
$connection = new PDO("pgsql:host=postgres user=$dbUser dbname=$dbName password=$dbPassword");

$userRepository = new \User\UserRepository($connection);
$users = $userRepository->fetchAll();
?>

<html>
<head>
    <title> réunion </title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"  href="style_index.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">

</head>
<div class="banniere">
    <?php
    menu_navigation();
    ?>
</div>
<h3><?php echo 'Réunions' ?></h3>

    <table class="table table-bordered table-hover table-striped">
        <thead style="font-weight: bold">
        <td>#</td>
        <td>Soirée</td>
        <td>Date</td>
        <td>Participants</td>
        <td>Compte Rendu</td>
        </thead>
        <?php /** @var \User\User $user */
        $participants='';
        $tu=$connection->query("SELECT * FROM public.reunion")->fetchAll();
        $part=$connection->query('SELECT * FROM public.Participants Where ');
        if (!empty($part)){
            $part=$part->fetchAll();
            foreach ($part as $p){
                $participants=$participant."</br>".$p['pseudo'];
            }
        }
        else{
            $participant='aucun';
        }
        foreach ($tu as $reu){
        ?>
            <tr>
                <td><?php ?></td>
                <td><?php echo $reu['soiree'] ?></td>
                <td><?php echo $reu['datee'] ?></td>
                <td><?php echo $participants ?></td>
                <td><?php echo $reu['cr'] ?> </td>
            </tr>
        <?php } ?>
    </table>



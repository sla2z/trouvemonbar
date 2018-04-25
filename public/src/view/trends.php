<?php
if (!defined('__ROOT__')) define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/config.php');
require_once(__ROOT__ . '/classes/Trend.php');

$trends = Trend::getTrends();

$tags = array_keys($trends);


?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8" />
    </head>
    <>
    <div class="trend-list">
        <?php
        //TODO
        /* afficher tous (cliquables) les tags + top likes/dislikes
         */
        foreach ($tags as $tag)
        {
            ?>
            <span class="trend">
                <a onclick="htagList('<?= $tag ?>')" href="#" class="action-link">
                    <?= $tag ?>,
                </a>
            </span>
            <?php
        }
        ?>
    </div>
    <div>


    </body>
</html>





/* TODO
* on initialise la page avec les toplikes pour pas laisser de blancs
*/

$posts = Post::topLikes();

/* affichage des posts */

foreach ($posts as $post)
{
/* TODO
* écrire dans post.php la fonction qui écrit de code html correspondant à l'affichage d'un post
* pour pouvoir l'appeler ici
*/
echo $post->toHtml();
echo "<br />";
}

/* TODO
* script js qui permet de changer la valeur de $posts et de réexécuter l'affichage de $post
* (déclenchement on click sur un tag)
*/
?>
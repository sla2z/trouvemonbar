<?php
require_once('../config.php');

if (isset($_GET['id']))
    $id = $_GET['id'];
else
    error_die("id", ERROR_FieldMissing);

$u = verify_logged_in();

try {
    $p = Post::fromID($id);
    $notFound = false;
}
catch (PostNotFoundException $e)
{
    $notFound = true;
    $author = "";
}

if(!$notFound) {
    $author = $p->getAuthor()->getUsername();
    $reposts = $p->getReposts();
    $likes = $p->getLikers();
    $dislikes = $p->getDislikers();
    $threads = $p->getThreadsFrom();
    $before = $p->getThreadTo();
}

?>
<!DOCTYPE HTML>
<html>
<head>
    <?php if(!$notFound): ?>
        <title>Vitz - Publication de <?=$author?></title>
    <?php else: ?>
        <title>Vitz</title>
    <?php endif ?>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="/assets/styles/general.css" />
    <link rel="stylesheet" href="/assets/styles/post.css" />
    <script src="/assets/js/post.js"></script>
    <script src="/assets/js/general.js"></script>
</head>
<body>
    <?php require "menu.php"; ?>
    <?php if ($notFound): ?>
    <div class="column-wrapper">
        <h1>
            Cette publication n'existe pas.
        </h1>
        <a href="/feed" class="centerlink">
            Retour aux dernières publications.
        </a>
    </div>
    <?php die(); endif; ?>
    <div class="column-wrapper">
        <h1>
            - Discussion -
        </h1>
        <div class="post-feed">
            <?php if (count($before) > 0): ?>
            <div class="post-feed" id="details-thread-before">
                <?php foreach($before as $post)
                        if ($post->ID != $p->ID)
                            affichePost($post);
                endif;
                ?>
            </div>
            <?php
            affichePost($p);
            ?>
            <div class="post-interactions">
                <div class="post-interaction interaction-type-selected" id="linkDetailsResponses">
                    <a href="#" onclick="return showResponses();">
                        <?= formatter_nombre(count($threads), "réponse", true) ?>
                    </a>
                </div>
                <div class="post-interaction" id="linkDetailsReposts">
                    <a href="#" onclick="return showReposts();">
                        <?= formatter_nombre(count($reposts), "recyclage") ?>
                    </a>
                </div>
                <div class="post-interaction" id="linkDetailsLikes">
                    <a href="#" onclick="return showLikes();">
                        <?= formatter_nombre(count($likes), "like") ?>
                    </a>
                </div>
                <div class="post-interaction">
                    <?= formatter_nombre(count($dislikes), "dislike") ?>
                </div>
            </div>
            <div class="post-interaction-details display-none" id="details-reposts">
                <?php foreach ($reposts as $repost): ?>
                    <div class="post-interactions-details-item">
                        <a href="/profile/<?= $repost->getAuthor()->getUsername(); ?>">
                            <?= $repost->getAuthor()->getUsername(); ?>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="post-interaction-details display-none" id="details-likes">
                <?php foreach ($likes as $liker): ?>
                    <div class="post-interactions-details-item">
                        <a href="/profile/<?= $liker->getUsername(); ?>">
                            <?= $liker->getUsername(); ?>
                        </a>
                    </div>
                <?php endforeach; ?>            </div>
            <div class="post-feed" id="details-responses">
                <?php
                foreach($threads as $thread):
                    ?>
                    <div class="response-thread">
                        <?php
                    $seen = array();
                    foreach($thread as $post):
                        if (in_array($post->getID(), $seen))
                            continue;

                        array_push($seen, $post->getID());
                        affichePost($post);
                    endforeach;
                    ?>
                    </div>
                <?php
                endforeach;
                ?>
            </div>
        </div>
    </div>
</body>
</html>
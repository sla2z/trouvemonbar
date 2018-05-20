<?php
require_once("../config.php");

$u = getUserFromCookie();

if ($u == null)
{
    header("Location: /login");
    die();
}

$limit = 50;
$posts = Post::findPosts(array(), $limit);
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Vitz - Fil</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="assets/styles/feed.css" />
    <script src="/assets/js/general.js"><</script>
    <script src="/assets/js/post.js"><</script>
    <script>
        var lastRefresh = <?= time(); ?>;
        var filter = "";
        var _before = <?= count($posts) > 0 ? end($posts)->getTimestamp() : time(); ?>;
    </script>
</head>
<body onload="refreshFeed(lastRefresh, filter)">
<?php require "menu.php"; ?>
<div class="column-wrapper">
    <h1>
        - Dernières Publications -
    </h1>
    <a id="link-posts-waiting" class="link-posts-waiting display-none" href="#" onClick="return showWaitingPosts();">
        <div class="post-in-feed" id="link-posts-waiting-wrapper">
            Nouvelles publications
        </div>
    </a>
    <div class="post-feed" id="post-feed">
        <?php
        foreach ($posts as $post) {
            if ($post->getRepostID() == null)
                affichePost($post);
            else
                afficheRepost($post);
            $before = $post->getTimestamp();
        }
        ?>
    </div>
    <a id="link-more-posts" class="link-more-posts" href="#" onClick="return getPostsBefore(_before, filter);">
        <div class="post-in-feed" id="link-more-posts-wrapper">
            Plus anciens
        </div>
    </a>
</div>
</body>
</html>
<?php

require_once("../../config.php");

$getOriginals = false;
if (isset($_GET['getoriginals']))
    $getOriginals = $_GET['getoriginals'] == "true" ? true : false;

if (isset($_GET['limit']))
    $limit = $_GET['limit'];
else
    $limit = 50;

if ($limit > 250)
    $limit = 250;

$posts = Post::topLikes();

if ($getOriginals)
    foreach($posts as $post) {
        $post->getRepostOf();
        if ($post->getRepostID() != null)
            $post->getRepostOf()->getAuthor();
    }

success_die($posts);
<?php

    if (isset($_GET['post_id']) && isset($_GET['parent_id'])) {
        $body = $_POST['body'];
        require('connect_db.php');

        $query = "INSERT INTO comments (body, post_id, parent_id) VALUES ('$body', {$_GET['post_id']}, {$_GET['parent_id']})";
        mysqli_query($conn, $query);
        header('Location: post.php?id=' . $_GET['post_id']);
    } 
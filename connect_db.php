<?php

require('config.php');

$conn = mysqli_connect(DATABASE_SERVER, USERNAME, PASSWORD, DB_NAME);
// $conn = mysqli_connect('localhost', 'root', '', 'blog_2');


if (!$conn) {
    die('Error connect db: ' . mysqli_connect_error());
}

// echo 'connected!';
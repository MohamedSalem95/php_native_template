<?php

require('config.php');

$conn = mysqli_connect(DATABASE_SERVER, USERNAME, PASSWORD, DB_NAME);

if (!$conn) {
    die('Error connect db: ' . mysqli_connect_error());
}

// echo 'connected!';
<?php

session_start();

function login_user($name, $id) {
    $_SESSION['logged_in'] = true;
    $_SESSION['name'] = $name;
    $_SESSION['id'] = $id;
}
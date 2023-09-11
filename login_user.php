<?php

function user_login($name, $id) {
    $_SESSION['logged_in'] = true;
    $_SESSION['name'] = $name;
    $_SESSION['id'] = $id;
}
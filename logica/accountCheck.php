<?php

session_start();

if(isset($_SESSION['username'])) {
    $response = true;
} else {
    $response = false;
}


echo $response;
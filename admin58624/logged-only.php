<?php 

function admin()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION['auth'])) {
        header('Location: ../index');
        exit();
    }
}
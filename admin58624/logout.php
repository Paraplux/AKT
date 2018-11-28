<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

unset($_SESSION['auth']);

header('Location: ./4562894');

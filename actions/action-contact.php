<?php

    if(session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if(isset($_POST['submit'])) {

        if(!isset($_POST['email']) || $_POST['email'] == "") {
            $_SESSION['flash']['fail']['email'] = "You did not enter you email adress";
        }

        if(!isset($_POST['message']) || $_POST['message'] == "") {
            $_SESSION['flash']['fail']['message'] = "You did not enter any message";
        }
        
        if(empty($_SESSION['flash']['fail'])) {
            $headers = "From:" . $_POST['email'];
            $mailTO = "";
            $subject = "Message from AKT Jewels contact page!";
            if (mail($mailTO, $subject, $_POST['message'], $headers)) {
                $_SESSION['flash']['success']['contact'] = "Thanks for your feedbacks !";
                header('Location: ../contact.php');
            } else {
                $_SESSION['flash']['fail']['contact'] = "Error! You mail has not been send !";
                header('Location: ../contact.php');
            }
        } else {
            header('Location: ../contact.php');
        }
    }
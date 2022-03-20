<?php
    require_once "../autoloader/autoload.php";

    session_start();

    $login = new login;
    if(!empty($_POST['login']) && !empty($_POST['pass']) && isset($_POST['login_btn'])) {
        if($login->login()==true) {
            $_SESSION['alert'] = "
            <div class='alertbox green'>
                <p>Pomyślnie zalogowano</p>
                <div class='closebtn'>&times;</div>
            </div>";
            header("Location: ../dashboard.php");
        } else {
            $_SESSION['alert'] = "
            <div class='alertbox'>
                <p>Nieprawidłowy login lub hasło</p>
                <div class='closebtn'>&times;</div>
            </div>";
            header('Location: ../index.php');
            exit();
        }
    } else {
        $_SESSION['alert'] = "
        <div class='alertbox'>
            <p>Uzupełnij pola danymi</p>
            <div class='closebtn'>&times;</div>
        </div>";
        header('Location: ../index.php');
        exit();
    }
?>
<?php
    require_once "../includes/dbconfig_classes.php";
    require_once "../includes/dbconnect_classes.php";
    require_once "../includes/settings_classes.php";

    session_start();
    if(!isset($_SESSION['logged']) && $_SESSION['logged']!=true) {
        header("Location: index.php");
        exit();
    }

    $settings = new settings;
    if(!empty($_POST['chg_user_oldpass']) && !empty($_POST['chg_user_newpass']) && isset($_POST['chg_user_pass_btn'])) {
        if($settings->chgpassword()==true)
            $_SESSION['alert'] = "
            <div class='alertbox green'>
                <p>Pomyślnie zmieniono hasło użytkownika</p>
                <div class='closebtn'>&times;</div>
            </div>";
        else
            $_SESSION['alert'] = "
            <div class='alertbox'>
                <p>Aktualne hasło się nie zgadza lub wystąpił błąd</p>
                <div class='closebtn'>&times;</div>
            </div>";
        header('Location: ../settings.php');
        exit();
    } else {
        $_SESSION['alert'] = "
        <div class='alertbox'>
            <p>Uzupełnij pola danymi</p>
            <div class='closebtn'>&times;</div>
        </div>";
        header('Location: ../settings.php');
        exit();
    }
?>
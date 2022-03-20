<?php
    require_once "../autoloader/autoload.php";

    session_start();
    if(!isset($_SESSION['logged']) && $_SESSION['logged']!=true) {
        header("Location: index.php");
        exit();
    }

    $settings = new settings;
    if(!empty($_POST['chg_user_nick']) && isset($_POST['chg_user_btn'])) {
        if($settings->chgnickname()==true)
            $_SESSION['alert'] = "
            <div class='alertbox green'>
                <p>Pomyślnie zmieniono nick użytkownika</p>
                <div class='closebtn'>&times;</div>
            </div>";
        else
            $_SESSION['alert'] = "
            <div class='alertbox'>
                <p>Taki użytkownik juz istnieje lub wystąpił błąd</p>
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
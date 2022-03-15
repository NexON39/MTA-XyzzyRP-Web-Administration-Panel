<?php
    require_once "../includes/dbconfig_classes.php";
    require_once "../includes/dbconnect_classes.php";
    require_once "../includes/panelusers_classes.php";

    session_start();
    if(!isset($_SESSION['logged']) && $_SESSION['logged']!=true) {
        header("Location: index.php");
        exit();
    }

    $panelusers = new panelusers;
    if(!empty($_POST['add_user_nick']) && !empty($_POST['add_user_pass']) && isset($_POST['add_user_btn'])) {
        if($panelusers->adduser()==true)
            $_SESSION['alert'] = "
            <div class='alertbox'>
                <p>Pomyślnie dodano użytkownika</p>
                <div class='closebtn'>&times;</div>
            </div>";
        else
            $_SESSION['alert'] = "
            <div class='alertbox'>
                <p>Taki użytkownik juz istnieje lub wystąpił błąd</p>
                <div class='closebtn'>&times;</div>
            </div>";
        header('Location: ../panelusers.php');
        exit();
    } else {
        $_SESSION['alert'] = "
        <div class='alertbox'>
            <p>Uzupełnij pola danymi</p>
            <div class='closebtn'>&times;</div>
        </div>";
        header('Location: ../panelusers.php');
        exit();
    }
?>
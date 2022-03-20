<?php
    require_once "../autoloader/autoload.php";

    session_start();
    if(!isset($_SESSION['logged']) && $_SESSION['logged']!=true) {
        header("Location: index.php");
        exit();
    }

    $panelusers = new panelusers;
    if(!empty($_POST['delete_user_nick']) && isset($_POST['delete_user_btn'])) {
        if($panelusers->deleteuser()==true)
            $_SESSION['alert'] = "
            <div class='alertbox green'>
                <p>Pomyślnie usunięto użytkownika</p>
                <div class='closebtn'>&times;</div>
            </div>";
        else
            $_SESSION['alert'] = "
            <div class='alertbox'>
                <p>Taki użytkownik nie istnieje lub wystąpił błąd</p>
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
<?php
    require_once "../autoloader/autoload.php";

    session_start();
    if(!isset($_SESSION['logged']) && $_SESSION['logged']!=true) {
        header("Location: index.php");
        exit();
    }

    $operations = new operations;

    if(
    (!empty($_POST['ban_uid']) && !empty($_POST['ban_time']) && !empty($_POST['ban_unit']) && !empty($_POST['ban_reason']) && isset($_POST['ban_btn'])) ||
    (!empty($_POST['kick_uid']) && !empty($_POST['kick_reason']) && isset($_POST['kick_btn'])) ||
    (!empty($_POST['aj_uid']) && !empty($_POST['aj_time']) && !empty($_POST['aj_reason']) && isset($_POST['aj_btn'])) ||
    (!empty($_POST['booc_uid']) && !empty($_POST['booc_time']) && !empty($_POST['booc_unit']) && !empty($_POST['booc_reason']) && isset($_POST['booc_btn'])) ||
    (!empty($_POST['gp_uid']) && !empty($_POST['gp_reason']) && !empty($_POST['gp_count']) && isset($_POST['gp_btn'])) ||
    (!empty($_POST['bpm_uid']) && !empty($_POST['bpm_time']) && !empty($_POST['bpm_unit']) && !empty($_POST['bpm_reason']) && isset($_POST['bpm_btn'])) ||
    (!empty($_POST['bbeat_uid']) && !empty($_POST['bbeat_time']) && !empty($_POST['bbeat_unit']) && !empty($_POST['bbeat_reason']) && isset($_POST['bbeat_btn']))) {
        
        if(!empty($_POST['ban_uid']) && !empty($_POST['ban_time']) && !empty($_POST['ban_unit']) && !empty($_POST['ban_reason']) && isset($_POST['ban_btn']))
            $res = $operations->ban();
        if(!empty($_POST['kick_uid']) && !empty($_POST['kick_reason']) && isset($_POST['kick_btn']))
            $res = $operations->kick();
        if(!empty($_POST['aj_uid']) && !empty($_POST['aj_time']) && !empty($_POST['aj_reason']) && isset($_POST['aj_btn']))
            $res = $operations->jail();
        if(!empty($_POST['booc_uid']) && !empty($_POST['booc_time']) && !empty($_POST['booc_unit']) && !empty($_POST['booc_reason']) && isset($_POST['booc_btn']))
            // $res = $operations->blockooc();
            var_dump($operations->blockooc());
        if(!empty($_POST['gp_uid']) && !empty($_POST['gp_reason']) && !empty($_POST['gp_count']) && isset($_POST['gp_btn']))
            $res = $operations->addgp();
        if(!empty($_POST['bpm_uid']) && !empty($_POST['bpm_time']) && !empty($_POST['bpm_unit']) && !empty($_POST['bpm_reason']) && isset($_POST['bpm_btn']))
            // $res = $operations->blockpm();
            var_dump($operations->blockpm());
        if(!empty($_POST['bbeat_uid']) && !empty($_POST['bbeat_time']) && !empty($_POST['bbeat_unit']) && !empty($_POST['bbeat_reason']) && isset($_POST['bbeat_btn']))
            // $res = $operations->blockbeat();
            var_dump($operations->blockbeat());

        // if($res[0]==true)
        //     $_SESSION['alert'] = "
        //     <div class='alertbox green'>
        //         <p>Pomyślnie wykonano operacje na użytkowniku</p>
        //         <div class='closebtn'>&times;</div>
        //     </div>";
        // else if($res[0]==false)
        //     $_SESSION['alert'] = "
        //     <div class='alertbox'>
        //         <p>Wystąpił błąd</p>
        //         <div class='closebtn'>&times;</div>
        //     </div>";
        // else
        //     $_SESSION['alert'] = "
        //     <div class='alertbox'>
        //         <p>Wystąpił błąd</p>
        //         <div class='closebtn'>&times;</div>
        //     </div>";
        // header('Location: ../operations.php');
        // exit();

    } else {
        $_SESSION['alert'] = "
        <div class='alertbox'>
            <p>Uzupełnij pola danymi lub wpisz poprawne dane</p>
            <div class='closebtn'>&times;</div>
        </div>";
        header('Location: ../operations.php');
        exit();
    }
?>
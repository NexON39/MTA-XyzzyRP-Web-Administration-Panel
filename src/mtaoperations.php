<?php
    require_once "../autoloader/autoload.php";

    session_start();
    if(!isset($_SESSION['logged']) && $_SESSION['logged']!=true) {
        header("Location: index.php");
        exit();
    }

    $db = new dbconnect;
    $operations = new operations;
    $now = date("Y-m-d H:i:s");

    if(
    (!empty($_POST['ban_uid']) && !empty($_POST['ban_time']) && !empty($_POST['ban_unit']) && !empty($_POST['ban_reason']) && isset($_POST['ban_btn']) && is_numeric($_POST['ban_uid']) && is_numeric($_POST['ban_time']) && ($_POST['ban_unit']=="m" || $_POST['ban_unit']=="h" || $_POST['ban_unit']=="d") && $_POST['ban_uid']>0 && $_POST['ban_time']>0) ||
    (!empty($_POST['kick_uid']) && !empty($_POST['kick_reason']) && isset($_POST['kick_btn']) && is_numeric($_POST['kick_uid']) && $_POST['kick_uid']>0) ||
    (!empty($_POST['aj_uid']) && !empty($_POST['aj_time']) && !empty($_POST['aj_reason']) && isset($_POST['aj_btn']) && is_numeric($_POST['aj_uid']) && $_POST['aj_uid']>0 && is_numeric($_POST['aj_time']) && $_POST['aj_time']>0) ||
    (!empty($_POST['booc_uid']) && !empty($_POST['booc_time']) && !empty($_POST['booc_unit']) && !empty($_POST['booc_reason']) && isset($_POST['booc_btn']) && is_numeric($_POST['booc_uid']) && is_numeric($_POST['booc_time']) && ($_POST['booc_unit']=="m" || $_POST['booc_unit']=="h" || $_POST['booc_unit']=="d") && $_POST['booc_uid']>0 && $_POST['booc_time']>0) ||
    (!empty($_POST['gp_uid']) && !empty($_POST['gp_reason']) && !empty($_POST['gp_count']) && isset($_POST['gp_btn']) && is_numeric($_POST['gp_uid']) && $_POST['gp_uid']>0 && is_numeric($_POST['gp_count']) && $_POST['gp_count']>0) ||
    (!empty($_POST['bpm_uid']) && !empty($_POST['bpm_time']) && !empty($_POST['bpm_unit']) && !empty($_POST['bpm_reason']) && isset($_POST['bpm_btn']) && is_numeric($_POST['bpm_uid']) && is_numeric($_POST['bpm_time']) && ($_POST['bpm_unit']=="m" || $_POST['bpm_unit']=="h" || $_POST['bpm_unit']=="d") && $_POST['bpm_uid']>0 && $_POST['bpm_time']>0) ||
    (!empty($_POST['bbeat_uid']) && !empty($_POST['bbeat_time']) && !empty($_POST['bbeat_unit']) && !empty($_POST['bbeat_reason']) && isset($_POST['bbeat_btn']) && is_numeric($_POST['bbeat_uid']) && is_numeric($_POST['bbeat_time']) && ($_POST['bbeat_unit']=="m" || $_POST['bbeat_unit']=="h" || $_POST['bbeat_unit']=="d") && $_POST['bbeat_uid']>0 && $_POST['bbeat_time']>0) ||
    (!empty($_POST['premiumskin_uid']) && !empty($_POST['premiumskin_skinid']) && isset($_POST['premiumskin_btn']) && is_numeric($_POST['premiumskin_uid']) && $_POST['premiumskin_uid']>0 && is_numeric($_POST['premiumskin_skinid']) && $_POST['premiumskin_skinid']>0)) {
        
        if(!empty($_POST['ban_uid']) && !empty($_POST['ban_time']) && !empty($_POST['ban_unit']) && !empty($_POST['ban_reason']) && isset($_POST['ban_btn'])) {
            $res = $operations->ban();
            $_uid = mysqli_real_escape_string($db->connect(), $_POST['ban_uid']);
            $sql = "INSERT INTO xyzzyrp_logs(id,user,action,date) VALUES ('NULL', '$_SESSION[user]', 'Zbanował użytkownika na serwerze o UID $_uid', '$now');";
        }
            
        if(!empty($_POST['kick_uid']) && !empty($_POST['kick_reason']) && isset($_POST['kick_btn'])) {
            $res = $operations->kick();
            $_uid = mysqli_real_escape_string($db->connect(), $_POST['kick_uid']);
            $sql = "INSERT INTO xyzzyrp_logs(id,user,action,date) VALUES ('NULL', '$_SESSION[user]', 'Wyrzucił użytkownika na serwerze o UID $_uid', '$now');";
        }

        if(!empty($_POST['aj_uid']) && !empty($_POST['aj_time']) && !empty($_POST['aj_reason']) && isset($_POST['aj_btn'])) {
            $res = $operations->jail();
            $_uid = mysqli_real_escape_string($db->connect(), $_POST['aj_uid']);
            $sql = "INSERT INTO xyzzyrp_logs(id,user,action,date) VALUES ('NULL', '$_SESSION[user]', 'Nadał aj na serwerze użytkownikowi o UID $_uid', '$now');";
        }

        if(!empty($_POST['booc_uid']) && !empty($_POST['booc_time']) && !empty($_POST['booc_unit']) && !empty($_POST['booc_reason']) && isset($_POST['booc_btn'])) {
            $res = $operations->blockooc();
            $_uid = mysqli_real_escape_string($db->connect(), $_POST['booc_uid']);
            $sql = "INSERT INTO xyzzyrp_logs(id,user,action,date) VALUES ('NULL', '$_SESSION[user]', 'Nadał blokadę OOC na serwerze użytkownikowi o UID $_uid', '$now');";
        }

        if(!empty($_POST['gp_uid']) && !empty($_POST['gp_reason']) && !empty($_POST['gp_count']) && isset($_POST['gp_btn'])) {
            $res = $operations->addgp();
            $_uid = mysqli_real_escape_string($db->connect(), $_POST['gp_uid']);
            $_gp = mysqli_real_escape_string($db->connect(), $_POST['gp_count']);
            $sql = "INSERT INTO xyzzyrp_logs(id,user,action,date) VALUES ('NULL', '$_SESSION[user]', 'Dodał użytkownikowi o UID $_uid liczbę $_gp GP na serwerze', '$now');";
        }

        if(!empty($_POST['bpm_uid']) && !empty($_POST['bpm_time']) && !empty($_POST['bpm_unit']) && !empty($_POST['bpm_reason']) && isset($_POST['bpm_btn'])) {
            $res = $operations->blockpm();
            $_uid = mysqli_real_escape_string($db->connect(), $_POST['bpm_uid']);
            $sql = "INSERT INTO xyzzyrp_logs(id,user,action,date) VALUES ('NULL', '$_SESSION[user]', 'Nadał blokadę PM na serwerze użytkownikowi o UID $_uid', '$now');";
        }

        if(!empty($_POST['bbeat_uid']) && !empty($_POST['bbeat_time']) && !empty($_POST['bbeat_unit']) && !empty($_POST['bbeat_reason']) && isset($_POST['bbeat_btn'])) {
            $res = $operations->blockbeat();
            $_uid = mysqli_real_escape_string($db->connect(), $_POST['bbeat_uid']);
            $sql = "INSERT INTO xyzzyrp_logs(id,user,action,date) VALUES ('NULL', '$_SESSION[user]', 'Nadał blokadę bicia na serwerze użytkownikowi o UID $_uid', '$now');";
        }

        if(!empty($_POST['premiumskin_uid']) && !empty($_POST['premiumskin_skinid']) && isset($_POST['premiumskin_btn'])) {
            $res = $operations->premiumskin();
            $_uid = mysqli_real_escape_string($db->connect(), $_POST['premiumskin_uid']);
            $_skinid = mysqli_real_escape_string($db->connect(), $_POST['premiumskin_skinid']);
            $sql = "INSERT INTO xyzzyrp_logs(id,user,action,date) VALUES ('NULL', '$_SESSION[user]', 'Nałożył skina o id $_skinid na serwerze użytkownikowi o UID $_uid', '$now');";
        }

        if($res[0]==true) {
            $_SESSION['alert'] = "
            <div class='alertbox green'>
                <p>Pomyślnie wykonano operacje na użytkowniku</p>
                <div class='closebtn'>&times;</div>
            </div>";
            $db->connect()->query($sql);
        }
        else if($res[0]==false)
            $_SESSION['alert'] = "
            <div class='alertbox'>
                <p>Wystąpił błąd</p>
                <div class='closebtn'>&times;</div>
            </div>";
        else
            $_SESSION['alert'] = "
            <div class='alertbox'>
                <p>Wystąpił błąd</p>
                <div class='closebtn'>&times;</div>
            </div>";
        header('Location: ../operations.php');
        exit();

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
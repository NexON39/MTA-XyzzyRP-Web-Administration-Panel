<?php
    session_start();
    require_once("../config/db_conf.php");

    if(!empty($_POST['login']) && !empty($_POST['pass']) && isset($_POST['login_btn'])) {
        $con = @new mysqli($db_host,$db_user,$db_pass,$db_name);
        
        if($con->connect_errno==0) {
            $login = $_POST['login'];
            $pass = $_POST['pass'];

            $login = htmlentities($login, ENT_QUOTES, "UTF-8");
            $pass = htmlentities($pass, ENT_QUOTES, "UTF-8");

            $now = date("Y-m-d H:i:s");

                if($res = $con->query(sprintf("SELECT * FROM xyzzyrp_users WHERE user='%s'",
                mysqli_real_escape_string($con,$login)))) {
                    if($res->num_rows==1) {
                        $row = $res->fetch_assoc();
                        if(password_verify(mysqli_real_escape_string($con,$pass),$row['pass'])) {
                            unset($_SESSION['alert']);
                            $_SESSION['logged'] = true;
                            $_SESSION['user'] = $row['user'];
                            $con->query("INSERT INTO xyzzyrp_logs(`id`,`user`,`action`,`date`) VALUES ('NULL', '$_SESSION[user]', 'Zalogował się', '$now');");
                            header("Location: ../dashboard.php");
                            $_SESSION['alert'] = "
                            <div class='alertbox green'>
                                <p>Pomyślnie zalogowano</p>
                                <div class='closebtn'>&times;</div>
                            </div>";
                            $res->free_result();
                            $con->close();
                        } else {
                            $_SESSION['alert'] = "
                            <div class='alertbox'>
                                <p>Błędny login lub hasło</p>
                                <div class='closebtn'>&times;</div>
                            </div>";
                            header("Location: ../index.php");
                            exit();
                        }
                    } else {
                        $_SESSION['alert'] = "
                        <div class='alertbox'>
                            <p>Błędny login lub hasło</p>
                            <div class='closebtn'>&times;</div>
                        </div>";
                        header("Location: ../index.php");
                        exit();
                    }
                } 
        }
    } else {
        $_SESSION['alert'] = "
        <div class='alertbox'>
            <p>Uzupełnij pola danymi</p>
            <div class='closebtn'>&times;</div>
        </div>";
        header("Location: ../index.php");
        exit();
    }

?>
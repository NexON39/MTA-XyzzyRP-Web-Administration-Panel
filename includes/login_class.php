<?php
    class login extends dbconnect
    {
        public function login() {
            $login = $_POST['login'];
            $pass = $_POST['pass'];
            $login = htmlentities($login, ENT_QUOTES, "UTF-8");
            $pass = htmlentities($pass, ENT_QUOTES, "UTF-8");
            $now = date("Y-m-d H:i:s");
            $_login = mysqli_real_escape_string($this->connect(), $login);
            $_pass = mysqli_real_escape_string($this->connect(), $pass);
            $sql = "SELECT * FROM xyzzyrp_users WHERE user='$_login'";
            if($res = $this->connect()->query($sql)) {
                if($res->num_rows==1) {
                    $row = $res->fetch_assoc();
                    if(password_verify($_pass, $row['pass'])) {
                        unset($_SESSION['alert']);
                        $_SESSION['logged'] = true;
                        $_SESSION['user'] = $row['user'];
                        $sql = "INSERT INTO xyzzyrp_logs(`id`,`user`,`action`,`date`) VALUES ('NULL', '$_SESSION[user]', 'Zalogował się', '$now');";
                        $this->connect()->query($sql);
                        $res->free_result();
                        $this->connect()->close();
                        return true;
                    } else
                        return false;
                }
            }
        }
    }
?>
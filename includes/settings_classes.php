<?php
    class settings extends dbconnect
    {
        // change nickname
        public function chgnickname() {
            $now = date("Y-m-d H:i:s");
            $nickname = $_SESSION['user'];
            $newnickname = $_POST['chg_user_nick'];
            $_newnickname = mysqli_real_escape_string($this->connect(), $newnickname);
            $sql = "SELECT * FROM xyzzyrp_users WHERE user='$_newnickname'";
            $res = $this->connect()->query($sql);
            if($res->num_rows>0)
                return false;
            else {
                $sql = "UPDATE xyzzyrp_users SET user='$_newnickname' WHERE user='$nickname';";
                $this->connect()->query($sql);
                $sql = "INSERT INTO xyzzyrp_logs(id,user,action,date) VALUES ('NULL', '$_SESSION[user]', 'Zmienił nick na $_newnickname', '$now');";
                $this->connect()->query($sql);
                $_SESSION['user'] = $_newnickname;
                return true;
            }         
        }
    }
?>
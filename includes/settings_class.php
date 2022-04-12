<?php
    // XyzzyRP Administration Panel Project
    // Author: NexON39
    // Discord: NexON39#5665
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

        // change password
        public function chgpassword() {
            $now = date("Y-m-d H:i:s");
            $oldpass = $_POST['chg_user_oldpass'];
            $newpass = $_POST['chg_user_newpass'];
            $_oldpass = mysqli_real_escape_string($this->connect(), $oldpass);
            $_newpass = mysqli_real_escape_string($this->connect(), $newpass);
            $sql = "SELECT * FROM xyzzyrp_users WHERE user='$_SESSION[user]';";
            $res = $this->connect()->query($sql);
            if($res->num_rows>0) {
                $row = $res->fetch_assoc();
                if(password_verify($_oldpass,$row['pass'])) {
                    $hash_newpass = password_hash($_newpass, PASSWORD_DEFAULT);
                    $sql = "UPDATE xyzzyrp_users SET pass='$hash_newpass' WHERE user='$_SESSION[user]';";
                    $this->connect()->query($sql);
                    $sql = "INSERT INTO xyzzyrp_logs(id,user,action,date) VALUES ('NULL', '$_SESSION[user]', 'Zmienił hasło', '$now');";
                    $this->connect()->query($sql);
                    return true;
                } else
                    return false;
            }
        }
    }
?>
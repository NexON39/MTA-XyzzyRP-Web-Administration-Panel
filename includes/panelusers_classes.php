<?php  
    class panelusers extends dbconnect
    {
        // showusers
        public function showusers() {
            $sql = "SELECT * FROM xyzzyrp_users";
            $res = $this->connect()->query($sql);
            if($res->num_rows>0) {
                echo "<table>";
                    echo "<tr>";
                        echo "<th>ID</th>";
                        echo "<th>Nick</th>";
                    echo "</tr>";
                while($row = $res->fetch_assoc()) {
                    echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['user']."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else
                echo "<div class='nodata'>Brak danych do wyświetlenia</div>";
        }

        // delete user
        public function deleteuser() {
            $now = date("Y-m-d H:i:s");
            $user = $_POST['delete_user_nick'];
            $_user = mysqli_real_escape_string($this->connect(), $user);
            $sql = "SELECT * FROM xyzzyrp_users WHERE user='$_user'";
            $res = $this->connect()->query($sql);
            if($res->num_rows>0) {
                $sql = "DELETE FROM xyzzyrp_users WHERE user='$_user';";
                $this->connect()->query($sql);
                $sql = "INSERT INTO xyzzyrp_logs(id,user,action,date) VALUES ('NULL', '$_SESSION[user]', 'Usunął użytkownika $_user', '$now');";
                $this->connect()->query($sql);
                return true;
            } else
                return false;
        }

        public function adduser() {
            $now = date("Y-m-d H:i:s");
            $user = $_POST['add_user_nick'];
            $pass = $_POST['add_user_pass'];
            $_user = mysqli_real_escape_string($this->connect(), $user);
            $sql = "SELECT * FROM xyzzyrp_users WHERE user='$_user'";
            $res = $this->connect()->query($sql);
            if($res->num_rows>0) {
                return false;   
            } else {
                $_pass = mysqli_real_escape_string($this->connect(), $pass);
                $_pass_hash = password_hash($_pass, PASSWORD_DEFAULT);
                $sql = "INSERT INTO xyzzyrp_users (id,user,pass) VALUES (NULL,'$_user','$_pass_hash');";
                $this->connect()->query($sql);
                $sql = "INSERT INTO xyzzyrp_logs(id,user,action,date) VALUES ('NULL', '$_SESSION[user]', 'Dodał użytkownika $_user', '$now');";
                $this->connect()->query($sql);
                return true;
            }
                
        }
    }
?>
<?php
    class logs extends dbconnect
    {
        public function getlogs() {
            if(!empty($_POST['log_search'])) {
                $log_search = $_POST['log_search'];
                $_log_search = mysqli_real_escape_string($this->connect(), $log_search);
                $sql = "SELECT * FROM xyzzyrp_logs WHERE id 
                LIKE '%$_log_search%' OR user 
                LIKE '%$_log_search%' OR action 
                LIKE '%$_log_search%' OR date 
                LIKE '%$_log_search%';";
            } else 
                $sql = "SELECT * FROM xyzzyrp_logs";
            
            $res = $this->connect()->query($sql);
            if($res->num_rows>0) {
                echo "<table>";
                    echo "<tr>";
                        echo "<th>ID</th>";
                        echo "<th>Nick</th>";
                        echo "<th>Opis</th>";
                        echo "<th>Data</th>";
                    echo "</tr>";
                while($row = $res->fetch_assoc()) {
                    echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['user']."</td>";
                        echo "<td>".$row['action']."</td>";
                        echo "<td>".$row['date']."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else
                echo "<div class='nodata'>Brak danych do wyświetlenia</div>";
        }
    }
?>
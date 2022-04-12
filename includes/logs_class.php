<?php
    // XyzzyRP Administration Panel Project
    // Author: NexON39
    // Discord: NexON39#5665
    class logs extends dbconnect
    {
        public function getlogs() {
            $page = $_GET['page'];
            $q = "SELECT * FROM xyzzyrp_logs;";
            $num_rows = $this->connect()->query($q)->num_rows;
            $pages = ceil($num_rows/20);
            $values = $num_rows-($page*20);

            if($page==1)
                $rows = $num_rows;
            else
                $rows = $num_rows-(20*($page-1));

            $_values = mysqli_real_escape_string($this->connect(), $values);
            $_rows = mysqli_real_escape_string($this->connect(), $rows);

            if(!empty($_POST['log_search'])) {
                $log_search = $_POST['log_search'];
                $_log_search = mysqli_real_escape_string($this->connect(), $log_search);
                $sql = "SELECT * FROM xyzzyrp_logs WHERE
                id LIKE '%$_log_search%' OR 
                user LIKE '%$_log_search%' OR 
                action LIKE '%$_log_search%' OR 
                date LIKE '%$_log_search%'
                ORDER BY id DESC;";
            }
            elseif(!empty($_POST['date_up']))
                $sql = "SELECT * FROM `xyzzyrp_logs` WHERE id<=$_rows AND id>=$_values ORDER BY date ASC";
            elseif(!empty($_POST['date_down']))
                $sql = "SELECT * FROM `xyzzyrp_logs` WHERE id<=$_rows AND id>=$_values ORDER BY date DESC";
            else 
                $sql = "SELECT * FROM xyzzyrp_logs WHERE id<=$_rows AND id>=$_values ORDER BY id DESC;";
            
            $res = $this->connect()->query($sql);
            if($res->num_rows>0) {
                echo "<div class='sort_btn'>";
                    echo "<form action='logs.php?page=$page' method='post'>";
                        echo "<div><input type='submit' value='Data↑' name='date_up'></div>";
                        echo "<div><input type='submit' value='Data↓' name='date_down'></div>";
                    echo "</form>";
                echo "</div>";
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
                echo "<div class='sortpages'>";
                for($i=1; $i<=$pages; $i++) {
                    echo "<div class='sortelement'><a href='logs.php?page=$i'>$i</a></div>";
                }
                echo "</div>";
            } else
                echo "<div class='nodata'>Brak danych do wyświetlenia</div>";
        }
    }
?>
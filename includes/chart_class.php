<?php
    // XyzzyRP Administration Panel Project
    // Author: NexON39
    // Discord: NexON39#5665
    class chart extends dbconnect
    {
        public function getChartData() {
            $q = "SELECT * FROM xyzzyrp_chart;";
            $res = $this->connect()->query($q);
            if($res->num_rows>14) {
                $q = "SELECT id FROM xyzzyrp_chart ORDER BY id DESC";
                $res = $this->connect()->query($q);
                $last_id = $res->fetch_array();
                $delete_id = $last_id[0]-14;
                $q = "DELETE FROM xyzzyrp_chart WHERE id<=$delete_id;";
                if($this->connect()->query($q)) {
                    if($res = $this->connect()->query($q)) {
                        $q = "SELECT * FROM xyzzyrp_chart;";
                        if($res = $this->connect()->query($q)) {
                            $data = array();
                            while($row = $res->fetch_assoc()) {
                                $data[] = $row;
                            }
                            return json_encode($data);
                        }      
                    }
                }  
            } elseif($res->num_rows==0) {
                $q = "INSERT INTO xyzzyrp_chart VALUES (NULL, 0, 'Brak danych');";
                for($i=0; $i<14; $i++) {
                    $this->connect()->query($q);
                }
                header('Location: ../dashboard.php');
            } else {
                $q = "SELECT * FROM xyzzyrp_chart;";
                if($res = $this->connect()->query($q)) {
                    $data = array();
                    while($row = $res->fetch_assoc()) {
                        $data[] = $row;
                    }
                    return json_encode($data);
                }    
            }
        }
    }
?>
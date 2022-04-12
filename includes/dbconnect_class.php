<?php
    // XyzzyRP Administration Panel Project
    // Author: NexON39
    // Discord: NexON39#5665
    class dbconnect extends dbconfig 
    {
        public function connect() {
            $con = @new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
            if($con->connect_errno==0)
                return $con;
            else 
                return false;
        }
    }  
?>
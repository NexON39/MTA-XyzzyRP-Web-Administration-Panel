<?php
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
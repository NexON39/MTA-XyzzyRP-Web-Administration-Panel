<?php
    class alerts
    {
        public function showAlert() {
            if(isset($_SESSION['alert'])) {
                echo $_SESSION['alert'];
                unset($_SESSION['alert']);
            }
        }
    }
?>
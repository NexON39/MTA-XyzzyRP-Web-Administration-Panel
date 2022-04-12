<?php
    // XyzzyRP Administration Panel Project
    // Author: NexON39
    // Discord: NexON39#5665
    require_once "vendor/autoload.php";

    use MultiTheftAuto\Sdk\Mta;
    use MultiTheftAuto\Sdk\Model\Server;
    use MultiTheftAuto\Sdk\Model\Authentication;

    class dashboard extends mtaconfig
    {
        public function mtaconnect() {
            $server = new Server($this->server_ip, $this->server_port);
            $auth = new Authentication($this->acl_user, $this->acl_pass);
            $mta = new Mta($server, $auth);
            return $mta;
        }

        public function getData() {
            $response = $this->mtaconnect()->getResource('xyzzyrp_ap_lua')->call('xyzzyrp_ap_dashboardata');
            return $response;
        }
    }

    class dashboard_db extends dbconnect {
        public function getPanelUsers() {
            $q = "SELECT COUNT(*) AS users FROM xyzzyrp_users;";
            if($res = $this->connect()->query($q))
                $row = $res->fetch_array();
            return $row;
        }
    }
?>
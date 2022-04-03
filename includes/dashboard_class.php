<?php
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
?>
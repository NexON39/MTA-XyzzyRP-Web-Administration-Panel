<?php
    require_once "../vendor/autoload.php";
    
    use MultiTheftAuto\Sdk\Mta;
    use MultiTheftAuto\Sdk\Model\Server;
    use MultiTheftAuto\Sdk\Model\Authentication;

    class operations extends mtaconfig
    {
        public function mtaconnect() {
            $server = new Server($this->server_ip, $this->server_port);
            $auth = new Authentication($this->acl_user, $this->acl_pass);
            $mta = new Mta($server, $auth);
            return $mta;
        }

        public function ban() {
            $ban_uid = $_POST['ban_uid'];
            $ban_time = $_POST['ban_time'];
            $ban_unit = $_POST['ban_unit'];
            $ban_reason = $_POST['ban_reason'];

            $response = $this->mtaconnect()->getResource('xyzzyrp_ap_lua')->call('xyzzyrp_ap_ban',$ban_uid,$ban_time,$ban_unit,$ban_reason);
            return $response;
        }

        public function kick() {
            $kick_uid = $_POST['kick_uid'];
            $kick_reason = $_POST['kick_reason'];

            $response = $this->mtaconnect()->getResource('xyzzyrp_ap_lua')->call('xyzzyrp_ap_kick',$kick_uid,$kick_reason);
            return $response;
        }
        
        public function jail() {
            $aj_uid = $_POST['aj_uid'];
            $aj_time = $_POST['aj_time'];
            $aj_reason = $_POST['aj_reason'];

            $response = $this->mtaconnect()->getResource('xyzzyrp_ap_lua')->call('xyzzyrp_ap_aj',$aj_uid,$aj_time,$aj_reason);
            return $response;
        }

        public function blockooc() {
            $booc_uid = $_POST['booc_uid'];
            $booc_time = $_POST['booc_time'];
            $booc_unit = $_POST['booc_unit'];
            $booc_reason = $_POST['booc_reason'];

            $response = $this->mtaconnect()->getResource('xyzzyrp_ap_lua')->call('xyzzyrp_ap_booc',$booc_uid,$booc_time,$booc_unit,$_SESSION['user'],$booc_reason);
            return $response;
        }
        
        public function addgp() {
            $gp_uid = $_POST['gp_uid'];
            $gp_reason = $_POST['gp_reason'];
            $gp_count = $_POST['gp_count'];

            $response = $this->mtaconnect()->getResource('xyzzyrp_ap_lua')->call('xyzzyrp_ap_addgp',$gp_uid,$gp_count,$gp_reason);
            return $response;
        }

        public function blockpm() {
            $bpm_uid = $_POST['bpm_uid'];
            $bpm_time = $_POST['bpm_time'];
            $bpm_unit = $_POST['bpm_unit'];
            $bpm_reason = $_POST['bpm_reason'];

            $response = $this->mtaconnect()->getResource('xyzzyrp_ap_lua')->call('xyzzyrp_ap_blockpm',$bpm_uid,$bpm_time,$bpm_unit,$_SESSION['user'],$bpm_reason);
            return $response;
        }

        public function blockbeat() {
            $bbeat_uid = $_POST['bbeat_uid'];
            $bbeat_time = $_POST['bbeat_time'];
            $bbeat_unit = $_POST['bbeat_unit'];
            $bbeat_reason = $_POST['bbeat_reason'];

            $response = $this->mtaconnect()->getResource('xyzzyrp_ap_lua')->call('xyzzyrp_ap_blockbeat',$bbeat_uid,$bbeat_time,$bbeat_unit,$_SESSION['user'],$bbeat_reason);
            return $response;
        }

        public function premiumskin() {
            $premiumskin_uid = $_POST['premiumskin_uid'];
            $premiumskin_skinid = $_POST['premiumskin_skinid'];

            $response = $this->mtaconnect()->getResource('xyzzyrp_ap_lua')->call('xyzzyrp_ap_premiumskin',$premiumskin_uid,$premiumskin_skinid,$_SESSION['user']);
            return $response;
        }
    }
?>
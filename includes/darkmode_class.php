<?php
    class darkmode
    {
        public function setTheme() {
            $theme = '';
            $checkedbox = '';
            if(!empty($_COOKIE['theme'])) {
                if($_COOKIE['theme']=='dark') {
                    $theme = 'darkmode';
                    $checkedbox = 'checked';
                    $array = array($theme, $checkedbox);
                } else if($_COOKIE['theme']=='light') {
                    $theme = 'lightmode';
                    $checkedbox = '';
                    $array = array($theme, $checkedbox);
                }
                return $array;
            } else {
                $theme = 'lightmode';
                $checkedbox = '';
                $array = array($theme, $checkedbox);
                return $array;
            }
        }
    }
?>
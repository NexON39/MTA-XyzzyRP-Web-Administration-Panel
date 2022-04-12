<?php
    // XyzzyRP Administration Panel Project
    // Author: NexON39
    // Discord: NexON39#5665
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../index.php");
    exit();
?>
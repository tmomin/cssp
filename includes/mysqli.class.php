<?php

    include ('mysqli.class.php');
    
    $config = array();
    $config['host'] = "mysql0.db.koding.com";
    $config['user'] = "tmomin_jojufivup";
    $config['pass'] = "password";
    $config['table'] = "tmomin_jojufivup";
    
    $DB = new DB($config);
    $DB->Query("SELECT * from basketball_scores");
    echo json_encode($DB->Get());
    
?>
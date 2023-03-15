<?php

    function connect_to_db() {

        $db_host = 'localhost';
        $db_user = 'niki';
        $db_pass = 'niki';
        $db_name = 'codex';

        return new PDO("mysql:host=".$db_host.";dbname=".$db_name, $db_user, $db_pass);
    }

?>   
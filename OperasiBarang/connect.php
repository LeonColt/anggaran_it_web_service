<?php
class connect
{
    function __construct() {
        $this->connect();
    }
    function __destruct() {
        $this->close();
    }
    function connect()
    {
        require_once '/config.php';
        $con = mysql_connect(server, db_user, db_pass);
        $db = mysql_select_db(database);
        return $db;
    }
    function close()
    {
        mysql_close();
    }
}


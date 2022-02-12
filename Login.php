<?php
$respon = array();
if(isset($_POST['user']) && isset($_POST['pass']))
{
    require_once 'connect.php';
    $db = new connect();
    if($db)
    {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $result = mysql_query("SELECT user, password FROM user WHERE user = '$user'");
        if($result)
        {
            $result = mysql_fetch_array($result);
            if(strcmp($result["user"], $user) == 0 && strcmp($result["password"], $pass) == 0)
            {
                $respon["login"] = "user dan pass benar";
            }
            else
            {
                $respon["login"] = "user atau pass salah";
            }
        }
        else
        {
            $respon["login"] = "data is empty";
        }
    }
    else
    {
        $respon["login"] = "failed to connect to db";
    }
}
else
{
    $respon["login"] = "user dan pass tidak boleh kosong";
}
echo "<br>";
echo json_encode($respon);


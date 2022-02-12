<?php
$respon = array();
if(isset($_POST['idio']) && isset($_POST['io']) && isset($_POST['idbarang']) && isset($_POST['user']) 
        && isset($_POST['lastupdate']) && isset($_POST['tanggal_input']))
{
    require_once '/connect.php';
    $db =  new connect();
    if($db)
    {
        $idio = $_POST['idio'];
        $io = $_POST['io'];
        $idbarang = $_POST['idbarang'];
        $user = $_POST['user'];
        $lastupdate = $_POST['lastupdate'];
        $tanggal_input = $_POST['tanggal_input'];
        $result = mysql_query("INSERT INTO io VALUES ('$idio', '$io', '$idbarang', '$user', "
                . "'$lastupdate', '$tanggal_input')");
        if($result)
        {
            $respon["pesan"] = "sukses";
        }
        else
        {
            $respon["pesan"] = "data tidak lengkap";
        }
    }
    else
    {
        $respon["pesan"] = "gagal koneksi ke database";
    }
}
else
{
    $respon["pesan"] = "data tidak lengkap";
}
echo json_encode($respon);
<?php
$respon = array();
require_once '/connect.php';
$db = new connect();
if($db)
{
    $result = mysql_query("SELECT tanggal_input FROM io LIMIT 1");
    if(mysql_num_rows($result) > 0)
    {
        $result = mysql_fetch_array($result);
        $respon["tanggal_input"] = $result["tanggal_input"];
        $respon["pesan"] = "sukses";
    }
    else
    {
        $respon["pesan"] = "belum ada input/output";
    }
}
else
{
    $respon["pesan"] = "koneksi ke db gagal";
}
echo json_encode($respon);

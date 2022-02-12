<?php
$respon = array();
require_once '/connect.php';
$db = new connect();
$result = mysql_query("SELECT * FROM barang");
if(mysql_num_rows($result) > 0)
{
    $respon["barang"] = array();
    while($baris = mysql_fetch_array($result))
    {
        $brg = array();
        $brg["idbarang"] = $baris["idbarang"];
        $brg["namabarang"] = $baris["namabarang"];
        array_push($respon["barang"], $brg);
    }
    $result = mysql_query("SELECT tanggal_input FROM io LIMIT 1");
    $respon["pesan"] = "sukses";
}
else
{
    $respon["pesan"] = "tidak ada barang";
}
echo json_encode($respon);



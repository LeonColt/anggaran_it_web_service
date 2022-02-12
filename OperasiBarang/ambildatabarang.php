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
        $brg["quantity"] = $baris["Quantity"];
        $brg["lastupdate"] = $baris["lastupdate"];
        array_push($respon["barang"], $brg);
    }
    $respon["pesan"] = "sukses";
}
else
{
    $respon["pesan"] = "tidak ada barang";
}
echo json_encode($respon);


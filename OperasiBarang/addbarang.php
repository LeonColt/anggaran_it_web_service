<?php
$respon = array();
if(isset($_POST['idbarang']) && isset($_POST['namabarang']) && isset($_POST['quantity']) 
        && isset($_POST['lastupdate']))
{
    require_once '/connect.php';
    $db = new connect();
    if($db)
    {
        $idbarang = $_POST['idbarang']; $namabarang = $_POST['namabarang'];
        $quantity = $_POST['quantity']; $lastupdate = $_POST['lastupdate'];
        $result = mysql_query("INSERT INTO barang VALUES('$idbarang', '$namabarang', '$quantity', '$lastupdate')");
        if($result)
        {
            $respon["pesan"] = "barang berhasil disimpan";
        }
        else
        {
            $respon["pesan"] = "data barang gagal disimpan";
        }
    }
    else
    {
        $respon["pesan"] = "gagal koneksi ke db";
    }
}
else
{
    $respon["pesan"] = "data tidak lengkap";
}
echo json_encode($respon);
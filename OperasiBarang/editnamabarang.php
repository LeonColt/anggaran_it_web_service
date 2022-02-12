<?php
$respon = array();
if(isset($_POST['idbarang']) && isset($_POST['namabarang']))
{
    require_once 'connectorandconfig/connect.php';
    $db = new connect();
    if($db)
    {
        $idbarang = $_POST['idbarang'];
        $namabarang = $_POST['namabarang'];
        $result = mysql_query("UPDATE barang SET namabarang = '$namabarang' WHERE idbarang = '$idbarang'");
        if($result)
        {
            $respon["pesan"] = "nama barang berhasil diubah";
        }
        else
        {
            $respon["pesan"] = "nama barang gagal diubah";
        }
    }
    else
    {
        $respon["pesan"] = "koneksi ke db gagal";
    }
}
else
{
    $respon["pesan"] = "data tidak lengkap";
}
echo json_encode($respon);


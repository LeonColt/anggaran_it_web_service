<?php
$respon = array();
if(isset($_POST['idio']) && isset($_POST['io']))
{
    require_once '/connect.php';
    $db = new connect();
    if($db)
    {
        $idio = $_POST['idio'];
        $result = mysql_query("SELECT idbarang, io FROM io WHERE idio = '$idio'");
        if(mysql_num_rows($result) > 0)
        {
            $result = mysql_fetch_array($result);
            $idbarang = $result["idbarang"];
            $oldio = $oldio = $result["io"];
            $result = mysql_query("SELECT Quantity FROM barang WHERE idbarang = '$idbarang'");
            if(mysql_num_rows($result) > 0)
            {
                $result = mysql_fetch_array($result);
                $quantity = $result["Quantity"];
                $quantity = $quantity - $oldio;
                $io = $_POST['io'];
                $quantity = $quantity + $io;
                $result = mysql_query("UPDATE barang SET Quantity = '$quantity' WHERE idbarang = '$idbarang'");
                if($result)
                {
                    $result = mysql_query("UPDATE io SET io = '$io' WHERE idio = '$idio'");
                    if($result)
                    {
                        $respon["pesan"] = "sukses";
                    }
                    else
                    {
                       $respon["pesan"] = "io gagal diubah"; 
                    }
                }
            }
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


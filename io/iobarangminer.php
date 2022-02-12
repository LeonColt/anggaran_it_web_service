<?php
$respon = array();
if(isset($_POST['idbarang']))
{
    require_once '/connect.php';
    $db = new connect();
    if($db)
    {
        $idbarang = $_POST['idbarang'];
        $result = mysql_query("SELECT idio, io, user, lastupdate, tanggal_input FROM io WHERE idbarang = '$idbarang'");
        if(mysql_num_rows($result) > 0)
        {
            $respon["io"] = array();
            while($baris = mysql_fetch_array($result))
            {
                $io = array();
                $io["idio"] = $baris["idio"];
                $io["io"] = $baris["io"];
                $io["user"] = $baris["user"];
                $io["lastupdate"] = $baris["lastupdate"];
                $io["tanggal_input"] = $baris["tanggal_input"];
                array_push($respon["io"], $io);
            }
            $result = mysql_query("SELECT Quantity FROM barang WHERE idbarang = '$idbarang'");
            $result = mysql_fetch_array($result);
            $respon["quantity"] = $result["Quantity"];
            $respon["pesan"] = "sukses";
        }
        else
        {
            $respon["pesan"] = "input output barang tidak ada";
        }
    }
    else
    {
        $respon["io"] = "koneksi ke db gagal";
    }
}
else
{
    $respon["io"] = "data tidak lengkap";
}
echo json_encode($respon);


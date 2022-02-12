<?php
$respon = array();
if(isset($_POST['idbarang']) && isset($_POST['dari']))
{
    require_once '/connect.php';
    $db = new connect();
    if($db)
    {
        $idbarang = $_POST['idbarang'];
        $dari = $_POST['dari'];
        $result = mysql_query("SELECT io, tanggal_input FROM io WHERE tanggal_input >= '$dari' AND idbarang = '$idbarang'");
        if(mysql_num_rows($result) > 0)
        {
            $respon["chart"] = array();
            while($baris = mysql_fetch_array($result))
            {
                $chart = array();
                $chart["io"] = $baris["io"];
                $chart["tanggal_input"] = $baris["tanggal_input"];
                array_push($respon["chart"], $chart);
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
        $respon["pesan"] = "koneksi ke db gagal";
    }
}
else
{
    $respon["pesan"] = "data tidak lengkap";
}
echo json_encode($respon);


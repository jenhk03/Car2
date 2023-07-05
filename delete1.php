<?php
require("connection1.php");
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $id = $_POST["id"];
    $command = "DELETE FROM tbl_car WHERE id = '$id'";
    $exec = mysqli_query($connect, $command);
    $check = mysqli_affected_rows($connect);
    if($check>0)
    {
        $response["code"] = 1;
        $response["message"] = "Sukses menghapus data";
    }
    else
    {
        $response["code"] = 0;
        $response["message"] = "Ada kesalahan";
    }
}
else
{
    $response["code"] = 0;
    $response["message"] = "Tidak ada post data";
}
echo json_encode($response);
mysqli_close($connect);
?>
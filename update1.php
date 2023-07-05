<?php
require("connection1.php");
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $id = $_POST["id"];
    $name = $_POST["name"];
    $country = $_POST["country"];
    $est = $_POST["est"];
    $founder = $_POST["founder"];
    $description = $_POST["description"];
    $command = "UPDATE tbl_car SET name = '$name', country = '$country', est = '$est', founder = '$founder', description = '$description' WHERE id = '$id'";
    $exec = mysqli_query($connect, $command);
    $check = mysqli_affected_rows($connect);
    if($check>0)
    {
        $response["code"] = 1;
        $response["message"] = "Sukses mengubah data";
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
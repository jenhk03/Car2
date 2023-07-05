<?php
require("connection1.php");
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = $_POST["name"];
    $country = $_POST["country"];
    $est = $_POST["est"];
    $founder = $_POST["founder"];
    $description = $_POST["description"];
    $command = "INSERT INTO tbl_car(name, country, est, founder, description) VALUES('$name', '$country', '$est', '$founder', '$description')";
    $exec = mysqli_query($connect, $command);
    $check = mysqli_affected_rows($connect);
    if($check>0)
    {
        $response["code"] = 1;
        $response["message"] = "Sukses menyimpan data";
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
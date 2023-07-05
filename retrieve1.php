<?php
require("connection1.php");
$command = "SELECT * FROM tbl_car";
$exec = mysqli_query($connect, $command);
$check = mysqli_affected_rows($connect);
if($check>0)
{
    $response["code"] = 1;
    $response["message"] = "Data Tersedia";
    $response["data"] = array();
    while($get = mysqli_fetch_object($exec))
    {
        $var["id"] = $get->id;
        $var["name"] = $get->name;
        $var["country"] = $get->country;
        $var["est"] = $get->est;
        $var["founder"] = $get->founder;
        $var["description"] = $get->description;
        array_push($response["data"], $var);
    }
}
else
{
    $response["code"] = 0;
    $response["message"] = "Data Tidak Tersedia";
}
echo json_encode($response);
mysqli_close($connect);
?>
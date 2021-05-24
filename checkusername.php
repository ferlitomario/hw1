<?php

require 'dbconfig.php';

header ('Content-type: application/json');

$conn = mysqli_connect($dbconfig['host'],$dbconfig['user'],$dbconfig['password'],$dbconfig['name']) or die(mysqli_error($conn));

$username =mysqli_real_escape_string ($conn,$_GET['q']);

    $query = "SELECT username from users
            WHERE username = '$username'";
    $res = mysqli_query ($conn, $query ) or die (mysqli_error($conn));

    $json = json_encode(array('exists' => mysqli_num_rows($res) > 0 ? true : false));

    echo $json;

    mysqli_close($conn);

?>

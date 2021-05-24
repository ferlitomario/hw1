<?php

require_once 'dbconfig.php';

header("Content-type: application/json");

$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));


$query = "Select titolo,immagine,descrizione from viaggi; ";

$res = mysqli_query($conn, $query) or die(mysqli_error($conn));

$viaggi = array();

while ($row=mysqli_fetch_assoc($res)) {


        $viaggi[]= array (
                              "titolo" => $row["titolo"],
                              "immagine" => $row["immagine"],
                              "descrizione"=>$row["descrizione"]
                            );
}

echo json_encode($viaggi);

?>

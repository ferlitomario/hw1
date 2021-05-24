<?php

    // Controllo che l'accesso sia legittimo
    if(!isset ($_GET["q"])) {
        echo "Non dovresti essere qui";
        exit;
    }


    //Imposto l'header della risposta
    header ('Content-type: application/json');

    


    //Connesione al DB
    $conn = mysqli_connect($dbconfig['host'],$dbconfig['user'],$dbconfig['password'],$dbconfig['name']) or die(mysqli_error($conn));


    //Leggo la stringa dell'email
    $email =mysqli_real_escape_string ($conn,$_GET['q']);



    // Costruisco la query
    $query = "SELECT email FROM users WHERE email = '$email'";



    //Eseguo la query
    $res = mysqli_query ($conn, $query ) or die (mysqli_error($conn));



 //Torna un JSON con chiave exists e valore boolean
    echo json_encode(array('exists' => mysqli_num_rows($res) > 0 ? true : false));

    mysqli_close($conn);


?>

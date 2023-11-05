<?php
    include"../konekcija/konekcija.php";

    $val = $_POST['vrednost'];

    $upitpretragaPesme = "SELECT * FROM proizvodi WHERE nazivProizvod LIKE '%".$val."%'";

    $pretraga = $conn->prepare($upitpretragaPesme);
    $pretraga->execute();
    $rezPretraga = $pretraga->fetchAll();

    if ($rezPretraga){
    echo json_encode($rez);
    http_response_code(200);
    }
    else {
    echo json_encode("nema");
    http_response_code(200);
    }
?>
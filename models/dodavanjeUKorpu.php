<?php
    session_start();

    include "../konekcija/konekcija.php";



   
    $userKorpa=$_POST['userKorpa'];
    $proizvodKorpa =$_POST['proizvodKorpa'];

    $upitKorpa = "INSERT INTO korpakorisnik (idKorisnik,idProizvod) VALUES(:usrK, :proK)";

    $regKorpa = $conn -> prepare($upitKorpa);
    $regKorpa -> bindParam(':usrK', $userKorpa);
    $regKorpa -> bindParam(':proK', $proizvodKorpa);

    $uspesnoKorpa = $regKorpa -> execute();

    if($uspesnoKorpa){
        $porukaKorpa = "Ubacen u korpu";
        echo json_encode($porukaKorpa);
        http_response_code(200);
    }
    else{
        $porukaKorpa = "Nije ubacen u korpu";
        echo json_encode($porukaKorpa);
        http_response_code(200);
    }

?>
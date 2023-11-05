<?php

    include "../konekcija/konekcija.php";

    
    $name = $_POST['ime'];
    $calorie = $_POST['kalorije'];
    $price = $_POST['cena'];
    $desc = $_POST['opis'];
    $pic = $_POST['slika'];

    $upitInert= "INSERT INTO proizvodi (nazivProizvod,slikaProizvod,kalorije,cena,opis) VALUES
(:ime,:slika,:kalo,:cena,:opis)";

    $insert = $conn->prepare($upitInert);

    
    $insert->bindParam('ime', $name);
    $insert->bindParam('slika', $pic);
    $insert->bindParam('kalo',$calorie);
    $insert->bindParam('cena',$price);
    $insert->bindParam('opis', $desc);

    $uspeh = $insert->execute();

    if($uspeh){

          
    $poruka = "Uspesno dodat proizvod";
    echo json_encode($poruka);
    http_response_code(200);
    
  
    }
    else{
    
        $poruka="Proizvod nije azuriran";
        echo json_encode($poruka);
        http_response_code(500);

    }
   
?>
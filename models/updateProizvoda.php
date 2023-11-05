<?php

    include "../konekcija/konekcija.php";

    $id = $_POST['id'];
    $newName = $_POST['novoIme'];
    $newCalorie = $_POST['noveKalorije'];
    $newPrice = $_POST['novaCena'];
    $newDesc = $_POST['noviOpis'];

    $upitUpdate= "UPDATE proizvodi
    SET nazivProizvod = :novoIme ,
    kalorije = :noveK,
    cena = :novaC,
    opis = :novOpis
    WHERE idProizvod = :id ";

    $update = $conn->prepare($upitUpdate);

    $update->bindParam('id', $id);
    $update->bindParam('novoIme', $newName);
    $update->bindParam('noveK',$newCalorie);
    $update->bindParam('novaC',$newPrice);
    $update->bindParam('novOpis', $newDesc);

    $uspeh = $update->execute();

    if($uspeh){

          
    $poruka = "Uspesno azuriran proizvod";
    echo json_encode($poruka);
    http_response_code(200);
    
  
    }
    else{
    
        $poruka="Proizvod nije azuriran";
        echo json_encode($poruka);
        http_response_code(500);

    }
   
?>
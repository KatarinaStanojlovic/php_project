<?php

    include "../konekcija/konekcija.php";

    $id = $_POST['id'];
    $newName = $_POST['imeKorisnika'];
    $newSurname = $_POST['prezimeKorisnika'];
    $newUsername = $_POST['usernameKorisnika'];
    $newEmail = $_POST['emailKorisnika'];

    $upitUpdate= "UPDATE korisnik
    SET ime = :novoIme ,
    prezime = :novoPrezime,
    username = :novUsername,
    email = :novEmail
    WHERE idKorisnik = :id ";

    $update = $conn->prepare($upitUpdate);

    $update->bindParam('id', $id);
    $update->bindParam('novoIme', $newName);
    $update->bindParam('novoPrezime',$newSurname);
    $update->bindParam('novUsername',$newUsername);
    $update->bindParam('novEmail', $newEmail);

    $uspeh = $update->execute();

    if($uspeh){

          
    $poruka = "Uspesno azuriran korisnik";
    echo json_encode($poruka);
    http_response_code(200);
    
  
    }
    else{
    
        $poruka="Korisnik nije azuriran";
        echo json_encode($poruka);
        http_response_code(500);

    }
   
?>
<?php 

include "../konekcija/konekcija.php";

$idDelete = $_POST['id'];

$deleteUser = " DELETE FROM korisnik WHERE idKorisnik = :idK";

$stmtDelete = $conn -> prepare($deleteUser);
$stmtDelete->bindParam(':idK', $idDelete);

$uspesno = $stmtDelete->execute();

if($uspesno){
    $poruka="Uspesno obrisan korisnik.";
    
    echo json_encode($poruka);
    http_response_code(200);
}
else{
    $poruka="Korisnik nije obrisan.";
    echo json_encode($poruka);
    http_response_code(200);
}

?>
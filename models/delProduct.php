<?php 

include "../konekcija/konekcija.php";

$idS = $_POST['id'];

$deleteProduct = " DELETE FROM proizvodi WHERE idProizvod = :idPro";

$stmtPrepare = $conn -> prepare($deleteProduct);
$stmtPrepare->bindParam(':idPro', $idS);

$uspesno = $stmtPrepare->execute();

if($uspesno){
    $poruka="Uspesno obrisan proizvod";
    
    echo json_encode($poruka);
    http_response_code(200);
}
else{
    $poruka="Proizvod nije obrisan";
    echo json_encode($poruka);
    http_response_code(200);
}

?>
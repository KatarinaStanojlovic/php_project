<?php
    include"../konekcija/konekcija.php";

    $id = $_POST['idKat'];

    $upit = "SELECT * FROM proizvodi INNER JOIN kategorija
    ON proizvodi.idKat=kategorija.idKat WHERE kategorija.idKat=$id"; 


    $stmt = $conn->prepare($upit);
    $stmt->execute();
    $rezultat = $stmt->fetchAll();

    if($rezultat){
    echo json_encode($rezultat);
    http_response_code(200);
    }
    else{
    echo json_encode("nema podataka trenutno");
    http_response_code(200);
    }

    // $uslov="";
    // $search="";
    // if(isset($_POST['pretraga'])){
    //     $search = $_POST['pretraga'];
    //     $uslov = "AND proizvod.nazivProizvod LIKE '%".$search."%'";
    // }

    // $upit = "SELECT * FROM proizvodi WHERE $uslov"
?>

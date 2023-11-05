<?php
    session_start();
    
    include"../konekcija/konekcija.php";

    $korisnicko = $_POST['usr'];
    $loz = $_POST['pass'];

    $kriptovanaLoz = md5($loz);
  
    $upitLogovanje = "SELECT * FROM korisnik WHERE username=:user AND
    lozinka=:pass";

    $log = $conn->prepare($upitLogovanje);
    $log->bindParam(':user',$korisnicko);
    $log->bindParam(':pass',$kriptovanaLoz);
    $log->execute();
   
    $rez = $log->fetch();


    if(!$rez){
        $error = "User does not exist, please try again!";
        echo json_encode($error);
        http_response_code(200);
    }
    else{
        $_SESSION['korisnik'] = $rez;
        $mess ="index.php";
        echo json_encode($mess);
        http_response_code(200);
    }
    
?>
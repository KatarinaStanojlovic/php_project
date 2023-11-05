<?php
    include"../konekcija/konekcija.php";
    $to = "katarina.stanojlovic.19.21@ict.edu.rs";

    $naslov = $_POST['subject'];
    $tekst = $_POST['content'];
    $osoba = $_POST['mailer'];
    
    $headers = "From:".$osoba."\r\n";
    $headers .= "Reply-To:".$osoba."\r\n";
    $headers .= "Content-Type: text/html\r\n";

    
    if (mail($to, $naslov, $tekst, $headers)) {
        echo json_encode("Your message has been successfully sent!") ;
    } 
    else {
        echo "Error.";
    }
?>
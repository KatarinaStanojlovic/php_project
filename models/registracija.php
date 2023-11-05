<?php
    include "../konekcija/konekcija.php";

    if($conn){
       

        $korisnicko = $_POST['usr'];
        $loz = $_POST['pass'];
        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];
        $mail = $_POST ['email'];

       

         $regexFullName = "/^([a-zšđčćžA-ZŠĐČĆŽ]{2,20})+$/";
         $regexUsername =" /^[A-Z][a-z0-9_-]{5,}$/";
         $regexEmail = "/^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$/";
         $regexPassword = "/^[a-zA-Z0-9!@#$%^&*]{6,16}$/";

         if (!preg_match($regexFullName, $ime)) {
            echo "Name is in wrong form";
            exit;
          }
          if (!preg_match($regexFullName, $prezime)) {
            echo "Surname is in wrong form";
            exit;
          }
          if (!preg_match($regexUsername, $korisnicko)) {
            echo "Username is in wrong form";
            exit;
          }
          if (!preg_match($regexPassword, $loz)) {
            echo "Password is in wrong form";
            exit;
          }
          else{
            $kriptovanaLoz = md5($loz);
          }
        
        
        
        
            
        
            $upitUbaci = "INSERT INTO korisnik (ime, prezime, username, email,lozinka,uloga,aktivan) VALUES (:ime, :prezime, :username ,:email, :lozinka, 'korisnik' , 1)";
            $reg = $conn->prepare($upitUbaci);
            $reg->bindParam(':ime', $ime);
            $reg->bindParam(':prezime',$prezime);
            $reg->bindParam(':username',$korisnicko);
            $reg->bindParam(':email', $mail);
            $reg->bindParam(':lozinka', $kriptovanaLoz);
        
            $uspesno = $reg->execute();
        
        
        if($uspesno){
        
          $upitLogovanje = "SELECT * FROM korisnik WHERE username=:username AND
          lozinka=:lozinka";
          $log = $conn->prepare($upitLogovanje);
          $log->bindParam(':username',$korisnicko);
          $log->bindParam(':lozinka',$kriptovanaLoz);
          $log->execute();
          $rez = $log->fetch();

          $_SESSION['korisnik'] = $rez;
          
          $poruka = "index.php";
          echo json_encode($poruka);
          http_response_code(200);
          
        
        }
        else{
         
            $poruka="Registracija nije uspela";
            echo json_encode($poruka);
            http_response_code(500);

        }
}
?>
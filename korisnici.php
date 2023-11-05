<?php 
    session_start();?>
<!DOCTYPE html>

<?php
include "konekcija/konekcija.php";

?>

<html lang="en">

<?php
include "head.php";


?>
<body>
    
     
            <!-- Modal3 Start -->
                              <div id="modal3"> 
                            <div class="container modal3-text">
                                <div class="container-fluid ">
                                    <button class="modal1Btn  btn btn-primary btn-square m-2" id="m3Btn"> X </button>
                                </div>
                                <p >
                                    <?php

                                        if (isset($_SESSION['korisnik'])) {
                                            
                                            $korisnik = $_SESSION['korisnik'];
                                            $podaci = ($_SESSION['korisnik']);
                                          echo "Update user: <span id='idUser'> </span>
                                          <form id='promenaKorisnika'>

                                          <label for='imeKorisnika'>Put user name</label>
                                          <input type='text' placeholder='Name'  id='imeKorisnika'/><br>
                                          <span id='imeKorisnikaErr' class='bad'></span><br>

                                          <label for='prezimeKorisnika'> Put user surname</label><br>
                                          <input type='text' placeholder='Surname'  id='prezimeKorisnika'/><br>
                                          <span id='prezimeKorisnikaErr' class='bad'></span><br>

                                          <label for='usernameKorisnika'> Put users username</label><br>
                                          <input type='text' placeholder='Username'  id='usernameKorisnika'/><br>
                                          <span id='usernameKorisnikaErr' class='bad'></span><br>

                                          <label for='emailKorisnika'> Put users email</label><br>
                                          <input type='email' placeholder='Email'  id='emailKorisnika'/> 
                                          <span id='emailKorisnikaErr' class='bad'></span><br>

                                          <button id='btnUserUpdate'>Update</button>
                                          </form>
                                           ";
                                        } else {
                                            echo("<p class='mText'>Please Login!</p><br>
                                            <a href='index.php' id='modalALogin' class=' btn btn-primary' > Login</a>");
                                        }  
                                    ?>
                                </p>
                            </div>
                            
                    </div>
        <!-- Modal3 End -->


      <!-- Navbar Start -->

      <div id='navbar' class="container-fluid p-4 nav-bar">
        <a href="index.php" class="navbar-brand px-lg-4 m-0">
            <h1 class="m-0 display-4 text-uppercase text-white">KOPPEE</h1>
        </a>
        <div class="num-cart col" >
          
        </div>  
        
        <?php
         if (isset($_SESSION['korisnik'])) {
              $korisnik = $_SESSION['korisnik'];
              $podaci = ($_SESSION['korisnik']);
            if($podaci -> aktivan==2){
                echo (" <div >
                <button class='btn btn-light' id='users'> <a href='korisnici.php'> <i class='fa-solid fa-user  shopping-cart  align-items-right'></i> </a></button>
            </div>");
            }
         }
           
        ?>
        <div id="burger">
            +
        </div>
        <div id="burgerMenu">
            <div id="section1">
                <ul class="list">
                    <?php
                        include "konekcija/konekcija.php";
   
                        $upitMeni = "SELECT * FROM meni";

                        $priprema = $conn->prepare($upitMeni);
                        $priprema->execute();
                        $rezultat = $priprema -> fetchAll();


                    foreach($rezultat as $stavka ):  ?>
                     <li> <a href="<?= $stavka -> url?>" ><?= $stavka->naziv ?> </a> </li>

                        <?php 
                            endforeach;
                        ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

     <div class="container-fluid " id="proizvodHeader">
                        </div>

                        <div id="korisnik" class="container">
                        <table class="table">
                                    <thead>
                                        <tr>
                                        
                                        <th scope="col">Name</th>
                                        <th scope="col">Surname</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Email</th>
                                        <th scope="col"> Update </th>
                                        <th scope="col"> Delete </th>
                                        </tr>
                                    </thead>
                        <?php
                             include "konekcija/konekcija.php";
                             $upitKorisnik = "SELECT * FROM korisnik";
                             $upitKorisnik = $conn -> prepare($upitKorisnik);
                             $upitKorisnik -> execute();
                             $rezultatKorisnik = $upitKorisnik -> fetchAll();
     
                             foreach($rezultatKorisnik as $stavkaKorisnik):
                        ?>
                       
                               
                                   
                                    
                                    <?php
                                    
                                    echo "   <tbody>
                                        <tr>
                                        
                                        <td> " .$stavkaKorisnik -> ime. "</td>
                                        <td>".$stavkaKorisnik ->prezime. "</td>
                                        <td> ".$stavkaKorisnik ->  username."</td>
                                        <td>".$stavkaKorisnik ->  email."</td>
                                        <td><button  class='btnUpdateKorisnika' data-idUpdate='" .$stavkaKorisnik -> idKorisnik."'> Update </button></td>
                                        <td><button class='btnDeleteKorisnika' data-idDelete='".$stavkaKorisnik -> idKorisnik."'> Delete</button></td>
                                    </tbody>";
                                    
                                    ?>
                                  
                        <?php
                            endforeach;
                        ?>
                          </table>
                        </div>


    <?php
        include "footer.php";
    ?>
    </body>
</html>
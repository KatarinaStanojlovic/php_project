<!DOCTYPE html>

<?php
include "konekcija/konekcija.php";

?>

<html lang="en">

<?php
include "head.php";


?>
<body>

      <!-- Navbar Start -->

      <div id='navbar' class="container-fluid p-4 nav-bar">
        <a href="index.html" class="navbar-brand px-lg-4 m-0">
            <h1 class="m-0 display-4 text-uppercase text-white">KOPPEE</h1>
        </a>
        <div class="num-cart col" >
          <?php
            include "logout.php";
          ?>
        </div>  
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


        <?php


        $poslatId = $_GET['id'];

        $upitId= "SELECT * FROM proizvodi WHERE idProizvod = $poslatId";

        $stmtProizvod = $conn->prepare($upitId);
        $stmtProizvod ->execute();

        $rezultat = $stmtProizvod->fetch();

        echo("<div class='container'> 

        <div class='row'>
        <div class='col col-lg-6 pro'>
                            <h2> ".$rezultat -> nazivProizvod."</h2>
                            <div class='slika '><img src='".$rezultat -> slikaProizvod."'/> </div>
                            <div class='kalorije textPr'> ".$rezultat -> kalorije." calories</div>
                            <div class='cena textPr'> ".$rezultat -> cena."$</div>

         </div>
         <div class='col col-6 pro'>
         
         <p class='opisProizvoda textPr'>".$rezultat->opis." </p>
         
         </div>                   
         </div>                
        </div>");



        include "footer.php";

        ?>

        </body>
</html>
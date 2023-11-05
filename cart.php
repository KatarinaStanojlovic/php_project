<?php session_start();  ?>
<!DOCTYPE html>
<?php
    if (isset($_SESSION['korisnik'])) {
   
        $korisnik = $_SESSION['korisnik'];
        $podaci = ($_SESSION['korisnik']);
      } else {
        // header("Location: index.php");
        // exit;
       
      }  
 include "konekcija/konekcija.php";
?>

<html lang="en">

<?php
    include "head.php";
?>

<body>
    <!-- Navbar Start -->
    <div id='navbar' class="container-fluid p-4 nav-bar">
        <a href="index.php" class="navbar-brand px-lg-4 m-0">
            <h1 class="m-0 display-4 text-uppercase text-white">KOPPEE</h1>
        </a>
        <div class="num-cart col" >
          <?php
            include "logout.php";
          ?>
        </div>  
        <?php
        if (isset($_SESSION['korisnik'])) {
            if($podaci -> aktivan==2){
                echo (" <div >
                <button class='btn btn-light' id='users'> <a href='#'> <i class='fa-solid fa-user  shopping-cart  align-items-right'></i> </a></button>
            </div>");
            }
         }
         else {
             echo "";
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
                        $priprema = $conn -> prepare($upitMeni);
                        $priprema -> execute();
                        $rezultat = $priprema -> fetchAll();

                        foreach($rezultat as $stavka):
                    ?>
                    <li><a href="<?= $stavka -> url ?>"> <?= $stavka -> naziv?></a></li>
                    <?php
                        endforeach;
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

     <!-- Carousel Start -->
     <div class="container-fluid p-0 mb-5">
        <div id="blog-carousel" class="carousel slide overlay-bottom" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <h2 class="text-primary font-weight-medium m-0">We Have Been Serving</h2>
                        <h1 class="display-1 text-white m-0">COFFEE</h1>
                        <h2 class="text-white m-0">* SINCE 1950 *</h2>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <h2 class="text-primary font-weight-medium m-0">We Have Been Serving</h2>
                        <h1 class="display-1 text-white m-0">COFFEE</h1>
                        <h2 class="text-white m-0">* SINCE 1950 *</h2>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#blog-carousel" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#blog-carousel" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>
    <!-- Carousel End -->

     <!-- Cart Start -->
     <div id="poruka">
        <div id="added-item" class="hide">
            <div id="text-item" class="col-6">
                <p id="text-item-p"></p>
            </div>
        </div>
    </div>
    <div id="cartDiv" class="container-fluid pt-5 table-responsive">
        <div class="row px-xl-5">
            <div class="col-lg-12 table-responsive mb-5 ">
            <table class="table text-center mb-0 ">
            <thead class="bg-secondary text-white ">
            <tr class="text-center">
                <th>Products</th>
                <th>Name</th>
                <th>Price</th>
                <th>Total</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody id="cartTable" class="align-middle">
            <tr id="${n.id}" class="red">

            <?php
            if (isset($_SESSION['korisnik'])) :
       
                $upit = "SELECT nazivProizvod, slikaProizvod, cena FROM proizvodi 
                INNER JOIN korpakorisnik ON proizvodi.idProizvod = korpakorisnik.idProizvod 
                INNER JOIN korisnik ON korisnik.idKorisnik = korpakorisnik.idKorisnik 
                WHERE korpakorisnik.idKorisnik = $podaci->idKorisnik 
                LIMIT 0, 25
                ";

                $rezKorpa = $conn -> prepare($upit);

                $uspehKorpe = $rezKorpa -> execute();
                $rezK = $rezKorpa-> fetchAll();

               if($rezK):
                   
               
                foreach($rezK as $stavkaKorpa):

            ?>
            
                    <td class="align-left"><img src="<?= $stavkaKorpa -> slikaProizvod?>" style="width: 100px;"></td>
                    <td class="naziv align-middle"><?= $stavkaKorpa -> nazivProizvod?></td>
                    <td class=" align-middle">$<?= $stavkaKorpa -> cena?></td>
             
                    <td class="total align-middle">$</td>
            <td class="align-middle"><div><button class="remove btn btn-sm btn-primary" >Remove</button><div></td>
            </tr>
            <?php
                endforeach;
                endif;
                endif;
            // else{
            //     echo("Your cart is empty!");
            // }
            ?>
            <tr>
            <td></td>
            <td></td>
            <td class="naziv">TOTAL PRICE:</td>
            <td  id="total-price"></td>
            <td><button class="btn btn-sm btn-primary order">Order Now</button></td>
            </tr>
            </tbody> 
            </table>
            
             </div>
        </div>
    </div>

     <!-- Cart End -->

     <?php
        include "footer.php";
    ?>
</body>

</html>
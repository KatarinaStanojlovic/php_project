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

    

    
     <!-- Author Start -->
    <div class="container" id="author">
        <div class="row">
            <div class="col s12 m6 l4 offset-l2">
                <img src="img/author.JPG" alt="Author"/>
            </div>
            <div class="flow-text col s12 m6 l6 text">
                <h2>Hello</h2>
                <p>my name is Katarina Stanojlović, I am 20 years old. I am a second year student at ICT College. I was born in Negotin where I finished my High School "Negotinska gimnazija". 
                     </p>
                     <div class="btn read-more">
                        <a href="https://stanojlovickatarina.netlify.app/"><button  type="button" class="btn-Cart "> READ MORE</button></a>
                    </div>
            </div>
        </div>
    </div>

     <!-- Author End -->

     <?php
        include "footer.php";
    ?>
</body>

</html>
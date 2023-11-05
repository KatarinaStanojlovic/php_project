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



    <!-- Menu Start -->
    <div id="pricing" class="container-fluid pt-5">
        <div class="container">
            <div class="section-title">
                <h1 class="display-4">Registration</h1> 
                <span id="regErr"> </span>
            </div>
           
        </div>
    </div>
    <!-- Menu End -->

    <!-- Reservation Start -->
    <div id="reservation"  class="container-fluid my-5">
        <div class="container">
            <div class="reservation position-relative overlay-top overlay-bottom">
                <div class="row align-items-center">
                    <div class="col my-5 my-lg-0">
                    
                    <div class="col-lg-12">
                        <div class="text-center p-5" style="background: rgba(51, 33, 29, .8);">
                            <h1 class="text-white mb-4 mt-5">Register</h1> 
                            <form class="mb-5">
                                <div class="form-group">
                                    <input id="fullName" type="text" class="form-control bg-transparent border-primary p-4" placeholder="Name"
                                        required="required"/>
                                    <span id="errFullName"></span>
                                </div>
                                <div class="form-group">
                                    <input id="surname" type="text" class="form-control bg-transparent border-primary p-4" placeholder="Surname"
                                        required="required"/>
                                    <span id="errSurname"></span>
                                </div>
                                <div class="form-group">
                                    <input id="username" type="text" class="form-control bg-transparent border-primary p-4" placeholder="Username"
                                        required="required"/>
                                    <span id="errUsername"></span>
                                </div>
                                <div class="form-group">
                                    <input id="email" type="email" class="form-control bg-transparent border-primary p-4" placeholder="Email"
                                        required="required" />
                                    <span id="errEmail"></span>
                                </div>
                                <div class="form-group">
                                    <input id="pass" type="password" class="form-control bg-transparent border-primary p-4" placeholder="Password"
                                        required="required" />
                                    <span id="errPassword"></span>
                                </div>
                                <div class="form-group">
                                    <input id="repeat" type="password" class="form-control bg-transparent border-primary p-4" placeholder="Repeat Password"
                                        required="required" />
                                    <span id="errRepeat"></span>
                                </div>
                                <div>
                                    <button id='regBtn' class="btn btn-primary btn-block font-weight-bold py-3" type="submit">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
    </div>
    </div>

    <?php
        include "footer.php";
    ?>
</body>

</html>
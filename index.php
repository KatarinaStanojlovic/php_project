<?php session_start();?>
<!DOCTYPE html>
<?php
    if (isset($_SESSION['korisnik'])) {
   
        $korisnik = $_SESSION['korisnik'];
        $podaci = ($_SESSION['korisnik']);
      } else {
        // header("Location: index.php");
        // exit;
       
      }  
 include "config/konekcija.php";
 include "models/dodatno/functions.php";
?>

<html lang="en">

<?php
    include "views/fixed/head.php";
?>

<body>
    <!-- Navbar Start -->
    <div id='navbar' class="container-fluid p-4 nav-bar">
        <a href="index.php" class="navbar-brand px-lg-4 m-0">
            <h1 class="m-0 display-4 text-uppercase text-white">KOPPEE</h1>
        </a>
        <div class="num-cart col" >
          <?php
            include "models\dodatno\userLogout.php";
          ?>
        </div>  
        <?php
         if (isset($_SESSION['korisnik'])) {
            if($podaci -> aktivan==2){
                echo (" <div >
                <button class='btn btn-light' id='users'> <a href='korisnici.php'> <i class='fa-solid fa-user  shopping-cart  align-items-right'></i> </a></button>
            </div>");
            }
         }
         else{
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

    <!--Main-->
    <?php
        $page = isset($_GET['page']) ? $_GET['page'] : 'home';
        switch($page){
            case 'home':
                include('views/home.php');
                break;
            case 'register':
                include('views/register.php');
                break;
            case 'proizvod':
                include('views/proizvod.php');
                break;
            case 'menu':
                include('views/menu.php');
                break;
            case 'login':
                include('views/login.php');
                break;
            case 'contact':
                include('views/contact.php');
                break;
                break;
            case 'cart':
                include('views/cart.php');
                break;
                break;
            case 'author':
                include('views/author.php');
                break;
            default:
                include('views/home.php');
        }
    ?>


    <?php
        include "views/fixed/footer.php";
    ?>
</body>

</html>
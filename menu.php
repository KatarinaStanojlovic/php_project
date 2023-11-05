<?php 
    session_start();?>
<!DOCTYPE html>
<html lang="en">
<?php
    include "konekcija/konekcija.php";
    $upitProizvodi = "SELECT * FROM proizvodi";
    $pripremaProizvod = $conn -> prepare($upitProizvodi);
    $pripremaProizvod -> execute();
    $rezultatProizvod = $pripremaProizvod -> fetchAll();
?>
<?php
    include "head.php";
?>

<body>

 <!-- Modal Start -->
    <div id="modal1"> 
            <div class="container modal1-text">
                <div class="container-fluid ">
                    <button class="modal1Btn  btn btn-primary btn-square m-2" id="m1Btn"> X </button>
                </div>
                <p >
                    <?php

                        if (isset($_SESSION['korisnik'])) {
                            
                            $korisnik = $_SESSION['korisnik'];
                            $podaci = ($_SESSION['korisnik']);
                            echo(" <p class='mText'>Are you sure you want to add product?</p><br>
                            <button id='modalAddToCart' class=' btn btn-primary  ' data-user=".$podaci->idKorisnik."  > Add to cart.</button>");
                        } else {
                            echo("<p class='mText'>Please Login!</p><br>
                            <a href='index.php' id='modalALogin' class=' btn btn-primary' > Login</a>");
                        }  
                    ?>
                </p>
            </div>
            
    </div>
   <!-- Modal End -->

   
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
                                          echo "Update product number: <span id='idU'> </span>
                                          <form id='promenaProizvoda'>

                                          <label for='newPro'>Put your product name</label>
                                          <input type='text' placeholder='Product name' id='newPro'/><br>
                                          <span id='newNameErr' class='bad'></span><br>

                                          <label for='newC'> Put number of kalories</label><br>
                                          <input type='text' placeholder='Calories' id='newC'/><br>
                                          <span id='newCaloriesErr' class='bad'></span><br>

                                          <label for='newPrice'> New price</label><br>
                                          <input type='text' placeholder='Price' id='newPrice'/><br>
                                          <span id='newPriceErr' class='bad'></span><br>

                                          <label for='desc'> New description</label><br>
                                          <textarea placeholder='Description' id='desc'> </textarea>
                                          <span id='newDescErr' class='bad'></span><br>

                                          <button id='btnProdUpdate'>Update</button>
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


   <!-- Modal2 Start -->
                    <div id="modal2"> 
                            <div class="container modal2-text">
                                <div class="container-fluid ">
                                    <button class="modal1Btn  btn btn-primary btn-square m-2" id="m2Btn"> X </button>
                                </div>
                                <p >
                                    <?php

                                        if (isset($_SESSION['korisnik'])) {
                                            
                                            $korisnik = $_SESSION['korisnik'];
                                            $podaci = ($_SESSION['korisnik']);
                                            echo(" <p class='mText'>Dear user $podaci->username, </p><br>
                                            <p class='mText'>please pick your favorite coffee: 
                                                <select id='listaKafa'>
                                                    <option> 1</option>
                                                </select>
                                            </p>
                                            <button class='btn btn-primary '> Send </button>");
                                        } else {
                                            echo("<p class='mText'>Please Login!</p><br>
                                            <a href='index.php' id='modalALogin' class=' btn btn-primary' > Login</a>");
                                        }  
                                    ?>
                                </p>
                            </div>
                            
                    </div>
        <!-- Modal2 End -->
                         


         
                        

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
                <button class='btn btn-light' id='users'> <a href='korisnici.php'> <i class='fa-solid fa-user  shopping-cart  align-items-right'></i> </a></button>
            </div>");
            }
         }
           
        ?>
        
        <div id="burger" >
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
                    <img class="w-100" src="assets/img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <h2 class="text-primary font-weight-medium m-0">We Have Been Serving</h2>
                        <h1 class="display-1 text-white m-0">COFFEE</h1>
                        <h2 class="text-white m-0">* SINCE 1950 *</h2>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="assets/img/carousel-2.jpg" alt="Image">
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

     <!-- Shop Start -->
    
     <div id="poruka" >
        <div id="added-item" class="hide">
            <div id="text-item" class="col-6">
                <p id="text-item-p"></p>
            </div>
        </div>
    </div>
     <div id="coffee-menu ">
         <div class="menu row m-0 ">
            <div class="filter-column col-md-12 col-lg-2  ">
                <div class="filter col">
                    
                    <div id="category">
                    <h4>DRINKS</h4>
                    <?php
                        include "konekcija/konekcija.php";
                        $upitKat = "SELECT * FROM kategorija";
                        $pripremaKat = $conn -> prepare($upitKat);
                        $pripremaKat -> execute();
                        $rezultatKat = $pripremaKat -> fetchAll();

                        foreach($rezultatKat as $stavkaKat):
                    ?>
                    <ul>
                        <li><input type="checkbox" value='<?= $stavkaKat -> idKat?>' name="kategorije" class="caffee-filter kat">
                        <label class="check"><?= $stavkaKat -> nazivKat?></label>
                        </li>
                    </ul>
                    <?php
                        endforeach;
                    ?>
                     </div>
                    <div id="sort-price">
                        <h4>SORTING</h4>
                        <select id="sort"><option value="0">Choose</option>
                        <?php
                             include "konekcija/konekcija.php";
                             $upitSort = "SELECT * FROM sortiranje";
                             $pripremaSort = $conn -> prepare($upitSort);
                             $pripremaSort -> execute();
                             $rezultatSort = $pripremaSort -> fetchAll();
     
                             foreach($rezultatSort as $stavkaSort):
                        ?>
                        <option value="<?= $stavkaSort -> vrednost?>"><?= $stavkaSort -> nazivSort?></option>

                        <?php
                            endforeach;
                        ?>
                        </select>
                    </div>

                    
                    <div class="search">
                        <h4>SEARCH</h4>
                        <input type="text" id="search-input" class="col" placeholder=".. by name" name="search-input"/>
                    
                    </div>
                    <div id="anketa">
                        <button class="btn btn-primary anketaBtn" id="btnAnketa">
                        Survey
                        </button>

                
                    </div>   

                </div>
                
            </div>
          
            
    <div class=" coffee-column col-md-12 col-lg-10 mt-0 mt-md-5" id="products">
                    <?php
                       

                        foreach($rezultatProizvod as $stavkaProizvod):
                    ?>
                   

                    <div class="card drinks col-sm-3 align-items-center  " >
                    
                    <?php 
                     if (isset($_SESSION['korisnik'])) {
                    if($podaci->aktivan==2){
                        echo "
                        
                        <div class='container adminHeader' >
                          
                        <button  class='btn btn-danger deleteCoffee' data-idDel = '".$stavkaProizvod->idProizvod."'> <i class='fa-solid fa-trash-can'></i> </button>
                        <button  class='btn btn-info updateCoffee' data-idUpdate='".$stavkaProizvod -> idProizvod."'> <i class='fa-sharp fa-solid fa-pen'></i></button>

                        </div>
                        
                        " ;
                    }};

                   

                    ?>

                    
 
                    
                    <a href="proizvod.php?id= <?= $stavkaProizvod->idProizvod ?>" class="slikaPr"> 
                    <img src="assets/<?= $stavkaProizvod -> slikaProizvod?>" alt="<?= $stavkaProizvod -> nazivProizvod?>" class="rounded-circle mb-3 mb-sm-0 img-fluid"/> </a> <br>
                    <h5><?= $stavkaProizvod -> nazivProizvod?></h5>
                    <p> <?= $stavkaProizvod -> kalorije?> calories </p>
                    <p> <?= $stavkaProizvod -> cena?>$</p>
                
                    <div class="btn">
                    <button  type="button" class="btn-Cart add" data-id="<?= $stavkaProizvod -> idProizvod?>"> ADD TO CART</button>
                </div>
            </div>
                    <?php
                        endforeach;
                    ?>
                    
                    
                    
                     <?php
         if (isset($_SESSION['korisnik'])) {
            if($podaci -> aktivan==2){
                echo (" <div class='container-fluid' > <h4> Add new product </h4>
                   
                    
                                          
                     <form id='dodavanjeProizvoda'>
                    <div class='form-group'>
                        <label for='productName'>Put your product name</label>      <br>           
                        <input type='text' placeholder='Product name' id='productName'/><br>                    
                        <span id='nameErr' class='bad'></span><br>
                    </div>
                     

                                          
                     <label for='calories'> Put number of calories</label><br>
                     <input type='text' placeholder='Calories' id='calories'/><br>
                     <span id='caloriesErr' class='bad'></span><br>


                     <label for='price'> New price</label><br>
                     <input type='text' placeholder='Price' id='price'/><br>
                     <span id='priceErr' class='bad'></span><br>

                     <label for='slika'>Select a file:</label>
                     <input type='file' id='slika' ><br>

                     <label for='description'> New description</label><br>
                     <textarea placeholder='Description' id='description'> </textarea>
                     <span id='descErr' class='bad'></span><br>


                     <button type='button' class='btn btn-primary' id='btnProdInsert'>Insert</button>

                    </form>
                    
                
                </div>");
            }
         }
           
        ?>

                    

                    
   
            </div>
          
        </div>


   

    </div>
     <!-- Shop End -->

     <?php
        include "footer.php";
    ?>
</body>

</html>
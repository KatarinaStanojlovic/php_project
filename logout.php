<p class="user">
        <!-- user -->
        <i class="fa-solid fa-user  shopping-cart  align-items-right"></i>
                <?php
                    if (isset($_SESSION['korisnik'])) {

                        if($podaci->aktivan==2){
                                echo " <span class='admin'> Admin </span>
                                ";
                        }
                        
                      echo $podaci -> username;

                   

                      }
            ?> <br>
        <i class="fa-solid fa-right-from-bracket" id="logout"></i>
</p>
        
            

                        <div class="text-center p-5" style="background: rgba(51, 33, 29, .8);">
                            <h1 class="text-white mb-4 mt-5">Login</h1> 
                            <span id="loginErr"> </span>
                            <form class="mb-5">
                                <div class="form-group">
                                    <input id="username" type="text" class="form-control bg-transparent border-primary p-4" placeholder="Username"
                                        required="required"/>
                                    <span id="errUsername"></span>
                                </div>
                                <div class="form-group">
                                    <input id="pass" type="password" class="form-control bg-transparent border-primary p-4" placeholder="Password"
                                        required="required" />
                                    <span id="errPassword"></span>
                                </div>
                                <div>
                                    <button id='logBtn' class="btn btn-primary btn-block font-weight-bold py-3" type="submit">Login</button>
                                </div>
                            </form>


                            <?php
                            
                         $pr = "SELECT * FROM korisnik";

                         $stmt = $conn->prepare($pr);
                         $stmt ->execute();
                         $rex= $stmt->fetchAll();

                         
                            
                            ?>

                        </div>
 
  
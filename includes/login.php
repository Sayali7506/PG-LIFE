<?php
 session_start();
require "../database_connect.php";

if($_SERVER['REQUEST_METHOD']=="POST"){

    function text_input($data){
        $data=htmlspecialchars($data);
        $data=trim($data);
        $data=stripcslashes($data);


        return $data;
      }

        $email=text_input($_POST['email']);
        $password=text_input($_POST['password']);
            
        $sql="SELECT name FROM users WHERE email='$email' AND password='$password' ";
      $result=mysqli_query($conn,$sql);
        if(!$result)
        {
           $errormsg="something Went Wrong";
         }

         $count=mysqli_num_rows($result);
        if($count > 0)
        {
                    $row=mysqli_fetch_assoc($result);
                     $name=$row["name"];
                 $_SESSION["user"]=$name;
       
                header("location:../index.php");
        }
        else{

        $errormsg="Record Not Found ";
         }

mysqli_close($conn);
}

?>


    <div class="login-container">
        
                
                <!-- login panel -->
                <div class="col-md-5 mt-5">
                <div class="panel p-3 mt-5">
                   <div class="panel-heading">
                        
                            Login with PG-LIFE
                    </div>
                   <div class="panel-body my-5 mx-2">
                     <form action="<?php echo $_SERVER['PHP_SELF'] ?> " role="form" method="POST" id="form_login" name="form_login">
                     <div class="alert alert-danger" role="alert" id="login_show">
                          
                      </div>
                      <?php if (isset($errormsg)) { echo "<p class='message'>" .$errormsg. "</p>" ;} ?>

                       <!-- email -->
                       <div class="form-group d-flex justify-content-center mt-3">
                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                <input type="email" placeholder="Email" name="email" id="login-email" class="form-control">
                               
                         </div>
                          <!-- password -->
                          <div class="form-group d-flex justify-content-center mt-3">
                                <i class="fa fa-key" aria-hidden="true"></i>
                                <input type="password" placeholder="Password" name="password" id="login-password" size="20" class="form-control">
                                
                           </div>
                           <!-- forget password -->
                           <div class="forget-password" id="forget_password">
                               <a href="forget_password.php">Forget Password</a>

                           </div>
                              <!--  sign up button  -->
                              <div class="d-grid mt-3">
                                        <input type="submit" class="btn btn-success btn-block"  id="btn_login"  value="Login">
                              </div>
                    </form>             
                   </div>
                   <div class="panel-footer">
                   <span>
                    <a href="index.php">Click here</a>
                    to register a new account
                </span>
                   </div>
               </div>


           </div>
       </div>

                </div>
          
    </div>


  
           

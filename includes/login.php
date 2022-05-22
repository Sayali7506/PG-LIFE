<?php

require "./database_connect.php";

if($_SERVER['REQUEST_METHOD']=="POST"){

    function text_input($data){
        $data=htmlspecialchars($data);
        $data=trim($data);
        $data=stripcslashes($data);


        return $data;
      }

        $email=text_input($_POST['email']);
        $password=text_input($_POST['password']);
            
        $sql="SELECT full_name FROM users WHERE email='$email' AND password='$password' ";
      $result=mysqli_query($conn,$sql);
        if(!$result)
        {
           $errormsg="something Went Wrong";
         }

         $count=mysqli_num_rows($result);
        if($count > 0)
        {
                    $row=mysqli_fetch_assoc($result);
                     $name=$row["full_name"];
                 $_SESSION["user"]=$name;
       
                header("location:../index.php");
                die();
        }
        else{

        $errormsg="Record Not Found ";
         }

mysqli_close($conn);
}

?>
<div class="container-fluid">
  <nav class="navbar">
    <div class="navbar-brand">
      <img src="image/logo.png" alt="logo">

    </div>
    <div class="nav navbar-nav">
      <div class="nav-item mx-5">
       <a class="nav-link" href="includes/signup.php">Sign In<i class="fa fa-long-arrow-right fa-1x signup-arrow"  aria-hidden="true"></i></a>
      </div>
    </div>

  </nav>






    <div class="login-container">
        
                
                <!-- login panel -->
                <div class="mt-5">
                <div class="panel p-3 mt-5">
                   <div class="panel-heading">
                     Log in with PG-LIFE
                   
                    
                  </div>
                   <div class="panel-body my-5 mx-2">
                   <div class="alert alert-danger" role="alert" id="login_show">
                     </div>
                  <?php if (isset($errormsg)) { echo "<p class='message'>" .$errormsg. "</p>" ;} ?>
                     <form action="<?php echo $_SERVER['PHP_SELF'] ?> " role="form" method="POST" id="form_login" name="form_login">
                    

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
                   
               </div>


           </div>
       </div>

      </div>
          
    </div>

</div>
    <script src="js/login_check.js" type="text/javascript"></script>


  
           

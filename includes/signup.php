<!-- satrt session -->
<?php 
 session_start();
require "../database_connect.php";



//check server request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //remove special charcter,space from data
  function test_input($data){
    $data=htmlspecialchars($data);
    $data=trim($data);
    $data=stripcslashes($data);
    return $data;

}
    // collect value of input field
    //check all field are not empty
    
        $name=test_input($_POST['name']);
   
        $email=test_input($_POST['email']);
  
        $phone=test_input($_POST['phone']);

    
    // password pattern
    function pattern($password){
        $pattern='/[A-Z][a-z][&@#$^][0-9][^\s]/';
        return preg_match($pattern,$password);
    }
    $password=pattern($_POST['password']);
     $college=test_input($_POST['college']);
    $gender=test_input($_POST['gender']);
    
  
  
  //submit data to database


  //check email id is alredy exit or not
  $sql1="SELECT * FROM users WHERE email='$email'";
  $result=mysqli_query($conn,$sql1);
  if(!$result)
  {
    $errormsg1="something went wrong";
       
      
  }
    $count=mysqli_num_rows($result);
    if($count>0)
    {
        
        $errormsg1="Email Has Been alredy Exit";
      
            
        
    }else
    {
  // insert data into table
         $sql2="INSERT INTO users(name,email,phone,password,gender,college)VALUES('$name','$email','$phone','$password','$gender','$college')";
        $result2=mysqli_query($conn,$sql2);
         if(!$result2)
         {
               
                $errormsg1="something went wrong";

        }else
        {
            
            $errormsg1="Account Created Succesfully";
            
            
            
        }
      
           
            
    }
    mysqli_close($conn);
}



// set session?>
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta  charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Signup|PG-LIFE</title>
    <link rel="stylesheet" href="../style/comman.css" />
       <link rel="stylesheet" href="../style/bootstrap.css"/>
       <link  rel="stylesheet"href="../style/bootstrap.min.css"/>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    

</head>
<body>
<div class="signup-container">
        <div class="container-fuild">
            <div class="row">
                <div class="col-md-6">
                    <div class="heading-container d-flex justify-content-center mt-5">
                        Enjoy Your Holidays  with luxiries  Life <br/>
                        Hurry Up ,Book Now<br/>
                    </div>
                    

                </div>
                <!-- signup panel -->
                <div class="col-md-5">
                <div class="panel p-3 mt-4">
                   <div class="panel-heading">
                        
                            Signup with PG-LIFE
                    </div>
                   <div class="panel-body my-2 mx-2">
                    
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" role="form" method="POST" id="form_signup">
                               
                                 <div class="alert alert-info" role="alert" id="signup_show">
                          
                                </div>
                            <!-- full name -->
                                <div class="form-group d-flex justify-content-center mt-3">
                                
                                <i class="fa fa-user-o" aria-hidden="true"> </i>
                                <input type="text" placeholder="Full Name" name="name" id="signup-name" class="form-control"/>
                                
                               </div>
                                <!-- email -->
                                <div class="form-group d-flex justify-content-center mt-3">
                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                <input type="email" placeholder="Email" name="email" id="signup-email" class="form-control">
                               
                                </div>
                                <!-- mobile Number -->
                                <div class="form-group d-flex justify-content-center mt-3">
                                <i class="fa fa-mobile" aria-hidden="true"></i>
                                <input type="phone" placeholder="Mobile Number" name="phone" id="signup-phone" size="10" class="form-control">
                                
                                </div>
                                <!-- password -->
                                <div class="form-group d-flex justify-content-center mt-3">
                                <i class="fa fa-key" aria-hidden="true"></i>
                                <input type="password" placeholder="Password" name="password" id="signup-password" size="20" class="form-control">
                                
                                </div>
                                <!-- college name -->
                                <div class="form-group d-flex justify-content-center mt-3">
                                <i class="fa fa-university" aria-hidden="true"></i>
                                <input type="text" placeholder="college name" name="college" id="signup-college" class="form-control">
                                
                                </div>
                                <!-- gender -->
                                <div class="gender mt-3">
                                    <span>I AM</span><br>
                                    
                                    <input type="radio" name="gender" value="Male" id="male">Male
                                    <input type="radio" name="gender" value="Female" id="female">Female
                                    
                                    
                                    <!--  sign up button  -->
                                    <div class="d-grid mt-3">
                                        <input type="submit" class="btn btn-success btn-block"  id="btn_signup" value="Create Account">
                                    </div>
                                </div>
                   </div>
                </form>
                   </div>
                   <div class="panel-footer">
                   <span>
                    <a href="">Click here</a>
                     Already have an account?
                </span>
                   </div>
               </div>


           </div>
       </div>

                </div>
            </div>
            <div class="footer-container">
            <?php include "../includes/footer.php"?>
        </div>
        </div>
        
    </div>


  
           

             
   
       </body>
       </html>

       <script src="../js/signup_check.js" type="text/javascript"></script>
       <script  src="../js/bootstrap.js" type="text/javascript"></script>
       <script src="../js/bootstrap.min.js" type="text/javascript"></script>
       <script src="../js/jquery.min.js" type="text/javascript"></script>

















































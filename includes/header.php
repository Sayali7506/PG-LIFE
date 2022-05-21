


<!-- Navbar -->

<div class="navbar navbar-expand-sm bg-light">
     <div class="container-fluid">
         <!-- pg-life logo -->
         <a class="navbar-brand" href="#">
                    <img src="image/logo.png" alt="pglife logo"/>
         </a>
         
         <!-- if session is not set -->
<?php
if(!isset($_SESSION['user'])){

?>         
        <ul class="navbar-nav ">
                    <!-- sign up modal -->
            <li class="nav-item">
              <a class="nav-link" href="includes/signup.php">
                    <i class="fa fa-user-circle"></i>Sign up
                </a>
             </li>
             <!-- login model -->
             <li class="nav-item">
                 
                <a  class="nav-link dropdown-toggle dropdown_btn" data-toggle="dropdown" id="login_btn" href="#">
                 <i class="fa fa-sign-in" aria-hidden="true"></i>Login</a>
                 <div class="login-panel">
                    
                 
                 </div>
            </li>
      </ul>


<?php
}
else{

    $name=$_SESSION['user'];
    $sql="SELECT * FROM users WHERE name='$name'";
    
    $result=mysqli_query($conn,$sql);
    $user=mysqli_fetch_assoc($result);





?>
    <ul class="navbar-nav">  
         <li class="nav-item mx-5 dropdown">
             
                      
            <div class="dropdown">
            <div class="dropdown-toggle dropdown_btn" data-toggle="dropdown" id="dropdown_btn">
            Hi, <?php echo $_SESSION['user'] ?>
             </div>
             <ul class="dropdown-menu mt-4 bg-secondary" id="dropdown-menu">
          <li class="dropdown-email d-flex justify-content-between my-2">
              <a class="dropdown-item text-white my-2" href="#"><?php echo $user['email']; ?> </a>
            <a href="includes/change_email.php"><i class="fa fa-pencil m-3 text-white" aria-hidden="true"></i></a> 
         
        </li>
          <li class="dropdown-dashborad">
             
             <a class="dropdown-item text-white my-2" href="dashborad.php">
             <i class="fa fa-user" aria-hidden="true"></i>Dashboard
             </a>
          </li>
         
         <li class="dropdown-logout">
              <a class="dropdown-item text-white my-2" href="logout.php">
             <i class="fa fa-sign-out" aria-hidden="true"></i>Logout
             </a>
        </li>
          
        </ul>

        </div> 
         
        </li>
        
       
    </ul>  

    <script>
        var dropmenu=document.getElementByClassName("dropdown-menu");
        var status=1;
        document.getElementByClassName("dropdown_btn").addEventListener("click",function(){
           
            

            
            if(status==1){
                dropmenu.style.display="block";
                status=0;

               
            }else{

                dropmenu.style.display="none";
                status=1;

               

            }


        });


        </script>
  
               
    


            
          
             
<?php
}  
?>   
     </div>
    
</div>  
        

       

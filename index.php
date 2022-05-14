
<?php
session_start();
?>
<?php require "headlink.php"?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta  charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no" />
        <title> Welcome |PG-LIFE</title>
        
    </head>
    <body>
        <!-- header Navbar -->
        
        <?php include "includes/header.php"?>
        
        <!-- serach city container -->
        <div class="serach-container">
            <div class="container-fluid">
            
        
               <div class="form-serach ">
               
               
                   
               <form id="search-form" action="dashborad.php" method="GET">
               <h1 class="white pb-3">Happiness per Square Foot</h1>   
               <div class="serach-input d-flex justify-content-centered">

              
                   <input type="text" placeholder="Serach City  with PG-LIFE" name="serach"  id="txt-serach" class="form-control">
                    <button type="submit" class="btn btn-outline-dark"> <i class="fa fa-search" aria-hidden="true"></i></button> 

                   </div>

                    </form>
                </div>
       
           </div>
        </div>
        <!-- footer city -container -->
        <div class="city-container">
            <?php  include "includes/city.php"?>

        </div>
        <div class="footer-container">
            <?php include "includes/footer.php"?>
        </div>
        

    </body>

</html>
<!-- head link file -->

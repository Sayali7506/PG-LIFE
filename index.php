
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
        <?php

        if(!isset($_SESSION['user'])){
            ?>

             <?php include "includes/login.php"?>
            <?php
        }else{
            ?>
            <!-- header Navbar -->
        
        
        <?php include "includes/header.php"?>
        
        <!-- serach city container -->
        <?php include "includes/search.php"?>


       
        <!-- footer city -container -->
        <div class="city-container">
         <?php  include "includes/city.php"?>

        </div>
        <div class="footer-container">
            <?php include "includes/footer.php"?>
        </div> 


         <?php
        }
        ?>
        
        

    </body>

</html>
<!-- head link file -->

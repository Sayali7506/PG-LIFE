

<?php  session_start() ?>
<?php require "headlink.php"?>
<!-- fetch user interested Property -->
<?php
// fetch data if user logined
$user = isset($_SESSION['user']) ? $_SESSION['user'] : NULL;

if($user){
    $user_name = $_SESSION['user'];
    $sql="SELECT id FROM users WHERE name='$user_name'";
    $result=mysqli_query($conn,$sql);
    if(!$result){
        $response=array("success"=>false,"message"=>"somenthing went wrong");
   }
     $count=mysqli_num_rows($result);
     if($count>0){
         $row= mysqli_fetch_assoc($result);
         $user_id=$row['id'];
        $sql3="SELECT property_id FROM  intersted_users_properties WHERE  user_id='$user_id' ";
        $result3=mysqli_query($conn,$sql3);
        if(!$result3){
            $response=array("success"=>false,"message"=>"somenthing went wrong");

        }elseif($row=mysqli_num_rows($result3)>=0){
            
            $interseted_users_properties=mysqli_fetch_assoc($result3);

        }
        else{
            $interseted_users_properties= 0;
        }
        
        
   }
}

$cityName = isset($_GET['serach']) ? $_GET['serach'] : NULL;

     
//  fetch data on serach
     if($cityName){
            
         // get id of serch city
        $sql1="SELECT id FROM cities WHERE name='$cityName' ";
        $result1=mysqli_query($conn,$sql1);
        $city_id=mysqli_fetch_assoc($result1);
        if(empty($city_id)){
            
             echo $cityErr="This city is not found";
        }
        else{

           $city_id = $city_id['id'];
        // get properties  of cities
          $sql2="SELECT * FROM properties WHERE city_id='$city_id' ";
         
        } 
}else{

     $sql2="SELECT * FROM properties";


}
    $result2=mysqli_query($conn,$sql2);
    if(!$result2){
         $response=array("success"=>false,"message"=>"somenthing went wrong");
    }
    else{
        $properties = mysqli_fetch_all($result2, MYSQLI_ASSOC);
    }

       









?>  



<!DOCTYPE html>
<html lang="en">
<head>
    <meta  charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title> Dashbord |PG-LIFE</title>
    

</head>
<body class="dashborad-page">
    <!-- header  -->
    <?php include "includes/header.php" ?>

<div class="property-container ">
    <!-- user location -->

<div class="breadcrumb-container-dashborad mt-5">


<nav aria-label="breadcrumb">
  <ol class="breadcrumb  p-3">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    
    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
  </ol>
</nav>
</div>


<div class="property-detail mt-3">
    <!-- get image according to proerties id -->
    <?php 
    if($properties){
    
    
     foreach($properties as $property){
         
        

        $property_images = glob("image/properties/" .$property['id'] . "/*");
        
      ?>     
        <div class="jumbotron bg-light p-3 mt-4">
           <div class="row">
               <!-- hotel image -->
                <div class="col-lg-4"> 
                    <div class="property-img properties-id-<?= $property['id']?> ">
                          <img class="img-responsive hotel-img" src="<?php echo $property_images[0] ?>" alt="imge not display"/>
                    </div>
                 </div> 
                 <!--  hotel name and interseted container -->

                <div class="col-lg-8">
                    <div class="property-detail px-4 mt-2">
                            <div class="d-flex justify-content-between">
                                   <div class="hotel-name">
                                         <h4><?php echo $property['name']?></h4>

                                    </div>
                                   <div class="interested-container">
                                      
                                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                                            
                                       
                                       

                                    </div>
                            </div>

                            <!-- rating  container -->
                <div class="rating-container">
                    <?php
                     $total_rating= ($property['rating_clean']+$property['rating_food']+$property['rating_safty'])/3;
                     $total_rating=$total_rating = round($total_rating, 1);
                      for($i=0;$i<5;$i++){
                        $rating=$total_rating;

                          if($rating>=$i+0.8){
                              ?>

                                <i class="fa fa-star" aria-hidden="true"></i>
                              <?php


                          }elseif($rating>=$i+0.3){
                             ?>
                             <i class="fa fa-star-half-o" aria-hidden="true"></i>
                              <?php

                          }else{
                              ?>
                              <i class="fa fa-star-o" aria-hidden="true"></i>
                              <?php
                          }
                          
                      }
                      echo  $total_rating;
                    
                    ?>
                   
                </div>


                <div class="gender-rent-container d-flex justify-content-between">
                <!-- gender Container -->
                     <div class="gender-container">
                        <?php
                          if($property['gender']==='male'){
                              ?>
                              <div class="male">
                                  <img  src="image/male.png" alt="">
                              </div>

                              <?php

                          }elseif($property['gender']==='female'){
                            ?>
                            <div class="female">
                                <img src="image\female.png" alt="">
                            </div>
                            <?php


                          }elseif($property['gender']==='unisex'){
                              ?>
                              <div class="unisex">
                                  
                                      <img src="image\unisex.png" alt="">

                                  
                                  
                              </div>
                         <?php
                          }
                        
                        
                        ?>


                     </div>
                     <div class="rent-container">
                                <div class="rent d-flex justify-content-center ">
                                    
                                <p class="rupees">
                                <mark><img  class="rupees-logo"src="image\rupee.png" alt="reupees image not displaed"/>
                                        <?php echo $property['rent']?>/-</mark>Per Month
                                        </p>
                                    
                                     
                                </div>
                                

                    </div>
                 </div>
                <!-- address container -->


                <div class="address-container mt-1">
                    <div class="address d-flex justify-content-centered">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <p class="lead m-1"><?php echo $property['address']?></p>
                    </div>



                </div>
                <!-- view moer button container -->
                <div class="view-more d-flex justify-content-end">
                   
                    <a  href="property_details.php?property_id=<?= $property['id'] ?>" role="button" class="btn btn-primary btn-block">View More</a>

                </div>














                    </div>
                </div>
                






            </div>
       </div>   

      
      
      
      
      
      
      
      <?php




      }
}     

      ?>

    </div>
</div> 
    <div class="footer-container">
            <?php include "includes/footer.php"?>
    </div>
    
    
 
    


</body>
</html>

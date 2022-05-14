 <?php  session_start();
  ?>
 <?php require "headlink.php"?>

  <?php


$user = isset($_SESSION['user'])?$_SESSION['user']:NULL;
$property_id=$_GET['property_id'];

// if user not logged in

$sql="SELECT * FROM properties WHERE id ='$property_id' ";
$result=mysqli_query($conn,$sql);
if(!$result){
    $response = array("success"=>false,"message"=>"Something Went Wrong");
      echo json_encode($response);
}

$property=mysqli_fetch_assoc($result);
 
// fetch amenities of property
 $sql1="SELECT a.* 
        FROM amenities a
        INNER JOIN properties_amenities pa
        ON a.id=pa.amenity_id
        WHERE pa.property_id='$property_id' ";
        
 $result1=mysqli_query($conn,$sql1);
 if(!$result1){
    $response = array("success"=>false,"message"=>"Something Went Wrong");
      echo json_encode($response);
}

$amenities=mysqli_fetch_all($result1,MYSQLI_ASSOC);
//   fetch testimonial of user
$sql2="SELECT * FROM testimonials WHERE property_id=$property_id";
 $result2=mysqli_query($conn,$sql2);
 if(!$result2){
    $response = array("success"=>false,"message"=>"Something Went Wrong");
      echo json_encode($response);
}
 $testimonials=mysqli_fetch_all($result2,MYSQLI_ASSOC);



  




?>


<div class="property-details">
     <!-- header  -->
     <?php include "includes/header.php" ?>
     
<!-- breadcrumb container -->
    <div class="container-fluid">
            <div class="breadcrumb-container mt-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb  p-3">
                             <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                             <li class="breadcrumb-item"><a href="dashborad.php">Dashboard</a></li>
                             <li class="breadcrumb-item active" aria-current="page"><?php echo $property['name']?></li>
                    </ol>
                </nav>
            </div>


                
<!-- image silding -->

<div id="property-image" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <?php
     $property_images = glob("image/properties/" . $property['id'] . "/*");
    ?>
    


  <div class="carousel-inner">
      <?php 
        foreach($property_images as $index => $image){

       ?>
            <div class="carousel-item <?= $index==0 ? "active":""; ?>" data-bs-interval="4000">
            <img src="<?= $image ?>" class="d-block w-100 carousel-image" alt="slide">
            </div>


        <?php
         }
        ?>
    
  </div>

  <!-- cariusel button -->
             <button class="carousel-control-prev" type="button" data-bs-target="#property-image" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#property-image" data-bs-slide="next">
                 <span class="carousel-control-next-icon" aria-hidden="true"></span>
                 <span class="visually-hidden">Next</span>
             </button>
        </div>
<!-- container-fluid end -->

    </div>
<!-- end carousel -->
 <div class="container">
        <div class="row mt-4">
            <div class="property-description d-flex justify-content-between">
                 <div class="name-rating">
     <!-- hotel name container -->
                        <div class="name-container">
                              <h3><?php echo $property['name']?></h3>
                         </div>
 <!-- rating container -->
                            <div class="rating-container">
                                <?php
                                     $total_rating= ($property['rating_clean']+$property['rating_food']+$property['rating_safty'])/3;
                                      $total_rating=$total_rating = round($total_rating, 1);
                                      for($i=0;$i<5;$i++)
                                        {
                                            $rating=$total_rating;

                                            if($rating>=$i+0.8)
                                            {
                                ?>

                                             <i class="fa fa-star" aria-hidden="true"></i>
                                 <?php


                                             }elseif($rating>=$i+0.3)
                                             {
                                 ?>
                                                   <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                 <?php

                                             }else
                                             {
                                 ?>
                                                 <i class="fa fa-star-o" aria-hidden="true"></i>
                                <?php
                                            }
                          
                                        }
                                         echo  $total_rating;
                    
                                ?>
                         <!-- end rating container -->
                            </div>
                            <!-- end name-rating container -->
                 </div> 

                 <div class="interested-container">
                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                </div> 
                <!-- end property-description  -->
         </div>

            <div class="description-container mt-2">
                <a class="read-more" data-bs-toggle="collapse" data-bs-target="#description">Read This</a>
                <p id="description" class="collapse" > 
                 <i class="fa fa-quote-left" aria-hidden="true"></i>
                    <?php echo $property['description']?>
                </p>
            </div>
         
            <!-- address container -->
            <div class="address-container mt-1">
                   <div class="address d-flex justify-content-centered p-2">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <p class="m-1"><?php echo $property['address']?></p>
                    </div>
             </div>

    </div>
    <!-- end property details -->
</div>







  <!-- property amenities container -->
  
<div class="container-fluid pt-4">
    <div class="amenities-container">
   <div class="row">
       
           <div class="facilities-heading">
                 <div class="facilities text-center mt-3">Services
                     </div>
            </div>    
   
      
       <div class="amenities-list d-flex justify-content-around">
           
         <div class="px-5">
         <h5 class="my-3">Common Area</h5>
                    <?php
                        foreach($amenities as $amenity){
                        if($amenity['type']=="Common Area"){
                            ?>
                            <div class="amenity-container mt-2">
                                <img src="image/amenities/<?= $amenity['icon'] ?>.svg" alt="comman area">
                                <p><?= $amenity['name']?></p>
                            </div>

                            <?php
                        }
                    }?>
             </div>       
    
         <div class="px-5">
         <h5 class="my-3">Building</h5>
    <?php 
                    foreach($amenities as $amenity){
                        if($amenity['type']=="Building"){
                            ?>
                            <div class="amenity-container mt-2">
                                <img src="image/amenities/<?= $amenity['icon'] ?>.svg" alt="building">
                                <p><?= $amenity['name']?></p>
                            </div>

                            <?php
                        }
                    }
                    ?>
         </div>
     


    <div class=" px-5">
        <h5 class="my-3">Bedroom</h5>
    <?php
                    foreach($amenities as $amenity){
                        if($amenity['type']=="Bedroom"){
                            ?>
                            <div class="amenity-container mt-2">
                                <img src="image/amenities/<?= $amenity['icon'] ?>.svg" alt="bedroom">
                                <p><?= $amenity['name']?></p>
                            </div>

                            <?php
                        }
                    }
                    ?>
     
     </div>                  
    
         <div class="px-5">
            <h5 class="my-3">Washroom</h5>
            <?php
                foreach($amenities as $amenity){
                    if($amenity['type']=="Washroom"){
             ?>
                <div class="amenity-container mt-2"> 
                 <img src="image/amenities/<?= $amenity['icon'] ?>.svg" alt="Washroom">
                 <p><?= $amenity['name']?></p>
             </div>

             <?php
             }
            }
            ?>
         </div>

     



</div>
</div>

</div>

<!-- booking container -->
<div class="container booking-container mt-5 ">

<div class="rent-container d-flex justify-content-center mt-1">
            
            <mark><img  class="rupees-logo"src="image\rupee.png" alt="reupees image not displaed"/>
            <?php echo $property['rent']?></mark>/-Per Month
        
                            
</div>
<div class="button-container">
    <button class="btn btn-dark w-50 btn-block d-block mx-auto">BooK Now</button>
</div>
</div>











<!-- testimonials -->

<div class="textimonials-container p-5">
  <div class="container">
      <div class="row">
          <h5 class="text-center mt-5">What People Said</h5>
            <?php
             foreach($testimonials as $testimonial){
                 ?>
                    <div class="col-md-5 d-block mx-auto p-5 my-4 testimonial">
                        
                             <p class="content"><?php echo $testimonial['content']?></p>
                            <cite class="text-right user-name">-<?php echo $testimonial['user_name']?></cite> 
                       
                    </div>

                 <?php
             }
            
            ?>
           
    </div>
  </div>
</div>
<div class="footer-container">
            <?php include "includes/footer.php"?>
</div>





            
      
            

                



                




      













 



















   



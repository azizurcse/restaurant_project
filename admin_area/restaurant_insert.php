<?php

include ("includes/db.php");


?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <link rel="stylesheet" type="text/css" href="../vendors/css/normalize.css"/>
        <link rel="stylesheet" type="text/css" href="../vendors/css/ionicons.min.css"/>
        <link rel="stylesheet" type="text/css" href="../vendors/css/grid.css"/>
        <link rel="stylesheet" type="text/css" href="../resources/css/style.css"/>
    <!--   <link rel="stylesheet" type="text/css" href="resources/css/new_style.css"/> -->
       
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <title>Restaurant Information System</title>
    </head>
    
    <body>
       
        
        <section class="section-form">
            <div class="row">
                <h2>Insert Restaurant</h2>
            </div>
            <div class="row">
                <form method="post" action="restaurant_insert.php" class="contact-form" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>Restaurant Name</label>
                        
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="restaurant_name" id="name" placeholdesr="put your name" required/>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>Restaurant Title</label>
                        
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="restaurant_title" id="name" placeholdesr="put your name" required/>
                        </div>
                    </div>
                    
                     <div class="row">
                        <div class="col span-1-of-3">
                            <label>Restaurant Category</label>
                        
                        </div>
                        <div class="col span-2-of-3">
                          <select name="restaurant_category">
                            <option></option>
                              
                              /*
                                    -------------
                                    ------FROM DATABASE GETTING FOOD CATEGORIES QUERY-------
                                    -------------
                                    */

                              
                              <?php
							
                                 $restaurant_cat="select * from restaurant_category";
    
                                 $run_restaurant_query=mysqli_query($con,$restaurant_cat);
    
                                while($row_restaurant=mysqli_fetch_assoc($run_restaurant_query))
                                {
                                  $res_cat_id=$row_restaurant['restaurant_cat_id'];
                                  $res_cat_title=$row_restaurant['restaurant_cat_title'];
        
                                  echo "<option value='$res_cat_id'>$res_cat_title</option>";
                                }
                              
                              ?>
                              
                              
                          </select>
                        </div>
                    </div>
					
					
					<div class="row">
                        <div class="col span-1-of-3">
                            <label>Restaurant Area</label>
                        
                        </div>
                        <div class="col span-2-of-3">
                          <select name="restaurant_category">
                            <option></option>
                              
                              /*
                                    -------------
                                    ------FROM DATABASE GETTING FOOD CATEGORIES QUERY-------
                                    -------------
                                    */

                              
                              <?php
							
                                 $restaurant_area="select * from area_category";
    
                                 $run_restaurant_query=mysqli_query($con,$restaurant_area);
    
                                while($row_restaurant=mysqli_fetch_assoc($run_restaurant_query))
                                {
                                  $res_area_id=$row_restaurant['area_id'];
                                  $res_area_title=$row_restaurant['area_title'];
        
                                  echo "<option value='$res_area_id'>$res_area_title</option>";
                                }
                              
                              ?>
                              
                              
                          </select>
                        </div>
                    </div>
					
					
                   
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>Restaurant Image</label>
                        
                        </div>
                        <div class="col span-2-of-3">
                            <input type="file" name="restaurant_image" id="com_name" placeholdesr="put your company name" required/>
                        </div>
                    </div>
                    
                   
                    
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>Restaurant Address</label>
                        
                        </div>
                        <div class="col span-2-of-3">
                            <textarea name="restaurant_address" rows='4' cols='20' id='food_cat'></textarea>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>Restaurant Keywords</label>
                        
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="restaurant_keywords" id="name" placeholdesr="put your name" required/>
                        </div>
                    </div>
                    
                   
                     <div class="row">
                        <div class="col span-1-of-3">
                            <label>&nbsp;</label>
                        
                        </div>
                        <div class="col span-2-of-3">
                            <input type="submit" name="submit" value="send it!"/>
                        </div>
                    </div> 
                    
                    
                    
                </form>
            </div>
        </section>
        
      
    </body>
</html>


<?php

    /*
-------------
------PUTTING DATA IN FOOD TABLE-------
-------------
*/

    if(isset($_POST['submit']))
     {
        $restaurant_name=$_POST['restaurant_name'];
        $restaurant_title=$_POST['restaurant_title'];
        $restaurant_category=$_POST['restaurant_category'];
       
        $restaurant_keywords=$_POST['restaurant_keywords'];
        $restaurant_address=$_POST['restaurant_address'];
        
        
        $restaurant_image=$_FILES['restaurant_image']['name'];
        $restaurant_image_tmp=$_FILES['restaurant_image']['tmp_name'];
        move_uploaded_file($restaurant_image_tmp,"restaurant_images/$restaurant_image");
        
        
        $insert_restaurant="insert into restaurant_table (restaurant_name,restaurant_title,restaurant_category,restaurant_image,restaurant_address,restaurant_keywords) values ('$restaurant_name','$restaurant_title','$restaurant_category','$restaurant_image','$restaurant_address','$restaurant_keywords')";
        
        $insert_restaurant_pro=mysqli_query($con,$insert_restaurant);
        
        if($insert_restaurant_pro)
        {
            echo "<script>alert('Food Inserted Successfully')</script>";
            echo "<script>window.open('restaurant_insert.php','_self')</script>";
        }
        
     }

?>



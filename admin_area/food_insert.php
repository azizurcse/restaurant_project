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
                <h2>Insert Foods</h2>
            </div>
            <div class="row">
                <form method="post" action="food_insert.php" class="contact-form" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>Food Name</label>
                        
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="food_name" id="name" placeholdesr="put your name" required/>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>Food Title</label>
                        
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="food_title" id="name" placeholdesr="put your name" required/>
                        </div>
                    </div>
                    
                     <div class="row">
                        <div class="col span-1-of-3">
                            <label>Food Category</label>
                        
                        </div>
                        <div class="col span-2-of-3">
                          <select name="food_category">
                            <option>select one</option>
                              
                              /*
                                    -------------
                                    ------FROM DATABASE GETTING FOOD CATEGORIES QUERY-------
                                    -------------
                                    */

                              
                              <?php
                                 $food_cat="select * from categories";
    
                                 $run_food_query=mysqli_query($con,$food_cat);
    
                                while($row_food=mysqli_fetch_array($run_food_query))
                                {
                                  $cat_id=$row_food['cat_id'];
                                  $cat_title=$row_food['cat_title'];
        
                                  echo "<option value='$cat_id'>$cat_title</option>";
                                }
                              
                              ?>
                              
                              
                          </select>
                        </div>
                    </div>
					
					
					<div class="row">
                        <div class="col span-1-of-3">
                            <label>Food Brand</label>
                        
                        </div>
                        <div class="col span-2-of-3">
                          <select name="food_brand">
                            <option>select one</option>
                              
                              /*
                                    -------------
                                    ------FROM DATABASE GETTING FOOD CATEGORIES QUERY-------
                                    -------------
                                    */

                              
                              <?php
                                 $food_brand="select * from brands";
    
                                 $run_food_query=mysqli_query($con,$food_brand);
    
                                while($row_food=mysqli_fetch_array($run_food_query))
                                {
                                  $brand_id=$row_food['brand_id'];
                                  $brand_title=$row_food['brand_title'];
        
                                  echo "<option value='$brand_id'>$brand_title</option>";
                                }
                              
                              ?>
                              
                              
                          </select>
                        </div>
                    </div>
					
                    
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>Food Price</label>
                        
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="food_price" id="name" placeholdesr="put your name" required/>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>Food Restaurant</label>
                        
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="food_restaurant" id="password" placeholdesr="put your password" required/>
                        </div>
                    </div>
                    
                   
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>Food Image</label>
                        
                        </div>
                        <div class="col span-2-of-3">
                            <input type="file" name="food_image" id="com_name" placeholdesr="put your company name" required/>
                        </div>
                    </div>
                    
                   
                    
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>Food Details</label>
                        
                        </div>
                        <div class="col span-2-of-3">
                            <textarea name="food_details" rows='4' cols='20' id='food_cat'></textarea>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>Food Keywords</label>
                        
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="food_keywords" id="name" placeholdesr="put your name" required/>
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
        $food_name=$_POST['food_name'];
        $food_title=$_POST['food_title'];
        $food_category=$cat_id;
        $food_brand=$brand_id;
        $food_price=$_POST['food_price'];
        $food_restaurant=$_POST['food_restaurant'];
        
        $food_details=$_POST['food_details'];
        $food_keywords=$_POST['food_keywords'];
        
        
        $food_image=$_FILES['food_image']['name'];
        $food_image_tmp=$_FILES['food_image']['tmp_name'];
        move_uploaded_file($food_image_tmp,"food_images/$food_image");
        
        
        $insert_food="insert into food_table (food_category,food_brand,food_name,food_title,food_price,food_restaurant,food_image,food_details,food_keywords) values ('$food_category','$food_brand','$food_name','$food_title','$food_price',' $food_restaurant','$food_image','$food_details','$food_keywords')";
        
        $insert_food_pro=mysqli_query($con,$insert_food);
        
        if($insert_food_pro)
        {
            echo "<script>alert('Food Inserted Successfully')</script>";
            echo "<script>window.open('admin.php?food_insert','_self')</script>";
        }
        
     }

?>
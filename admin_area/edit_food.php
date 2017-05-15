<?php

include ("includes/db.php");
if(isset($_GET['edit_food'])){
    $get_id=$_GET['edit_food'];
    
      $get_food="select * from food_table where food_id='$get_id'";
    $run_food=mysqli_query($con,$get_food);
    
    
    $i=0;
    $row_food=mysqli_fetch_array($run_food);
        
        $food_id=$row_food['food_id'];
        $food_name=$row_food['food_name'];
        $food_title=$row_food['food_title'];
        $food_image=$row_food['food_image'];
        $food_price=$row_food['food_price'];
        $food_restaurant=$row_food['food_restaurant'];
        $food_detail=$row_food['food_details'];
        $food_keyword=$row_food['food_keywords'];
        $food_category=$row_food['food_category'];
        $food_brand=$row_food['food_brand'];
    
	// for category
	
    $get_cat="select * from categories where cat_id='$food_category'";
    $query_cat=mysqli_query($con,$get_cat);
    $row_cat=mysqli_fetch_array($query_cat);
    $category_title=$row_cat['cat_title'];
	
	// for brand
	$get_brand="select * from brands where brand_id='$food_brand'";
    $query_brand=mysqli_query($con,$get_brand);
    $row_brand=mysqli_fetch_array($query_brand);
    $brand_title=$row_brand['brand_title'];
	

}
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
                <h2>Update Foods</h2>
            </div>
            <div class="row">
                <form method="post" action="" class="contact-form" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>Food Name</label>
                        
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="food_name" id="name" value="<?php echo $food_name; ?>" placeholdesr="put your name" required/>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>Food Title</label>
                        
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="food_title" id="name" value="<?php echo $food_title; ?>" placeholdesr="put your name" required/>
                        </div>
                    </div>
                    
                     <div class="row">
                        <div class="col span-1-of-3">
                            <label>Food Category</label>
                        
                        </div>
                        <div class="col span-2-of-3">
                          <select name="food_category">
                            <option><?php echo $category_title; ?></option>
                              
                              /*
                                    -------------
                                    ------FROM DATABASE GETTING FOOD CATEGORIES QUERY-------
                                    -------------
                                    */

                              
                              <?php
                                 $food_cat="select * from categories";
    
                                 $run_food_query=mysqli_query($con,$food_cat);
    
                                while($row_food=mysqli_fetch_assoc($run_food_query))
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
                            <option><?php echo $brand_title; ?></option>
                              
                              /*
                                    -------------
                                    ------FROM DATABASE GETTING FOOD CATEGORIES QUERY-------
                                    -------------
                                    */

                              
                              <?php
                                 $food_brand="select * from brands";
    
                                 $run_food_query=mysqli_query($con,$food_brand);
    
                                while($row_food=mysqli_fetch_assoc($run_food_query))
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
                            <input type="text" name="food_price" id="name" value="<?php echo $food_price; ?>" placeholdesr="put your name" required/>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>Food Restaurant</label>
                        
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="food_restaurant" id="password" value="<?php echo $food_restaurant; ?>" placeholdesr="put your password" required/>
                        </div>
                    </div>
                    
                   
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>Food Image</label>
                        
                        </div>
                        <div class="col span-2-of-3">
                            
                            <input type="file" name="food_image" id="com_name"/>
                            <img src="food_images/<?php echo $food_image; ?>" width="55" height="55"/>
                           
                        </div>
                    </div>
                    
                   
                    
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>Food Details</label>
                        
                        </div>
                        <div class="col span-2-of-3">
                            <textarea name="food_details" rows='4' cols='20' id='food_cat'><?php echo $food_detail; ?></textarea>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>Food Keywords</label>
                        
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="food_keywords" id="name" value="<?php echo $food_keyword; ?>" placeholdesr="put your name" required/>
                        </div>
                    </div>
                    
                   
                     <div class="row">
                        <div class="col span-1-of-3">
                            <label>&nbsp;</label>
                        
                        </div>
                        <div class="col span-2-of-3">
                            <input type="submit" name="update_food" value="Update Food"/>
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

    if(isset($_POST['update_food']))
     {
        $update_id=$food_id;
        $food_name=$_POST['food_name'];
        $food_title=$_POST['food_title'];
        $food_category=$cat_id;
        $food_brand=$brand_id;
        $food_price=$_POST['food_price'];
        $food_restaurant=$_POST['food_restaurant'];
        
        $food_details=$_POST['food_details'];
        $food_keywords=$_POST['food_keywords'];
         $food_keyords=$_POST['food_keywords'];
        
        $food_image=$_FILES['food_image']['name'];
        $food_image_tmp=$_FILES['food_image']['tmp_name'];
        move_uploaded_file($food_image_tmp,"food_images/$food_image");
        
        
        
        $update_food="update food_table set food_category='$cat_id',food_brand='$brand_id',food_name='$food_name',food_title='$food_title',food_price='$food_price',food_restaurant='$food_restaurant',food_image='$food_image',food_details='$food_details',food_keywords='$food_keyords' where food_id='$update_id'";
        
        $update_food_pro=mysqli_query($con,$update_food);
        
        if($update_food_pro)
        {
            echo "<script>alert('Food updated Successfully')</script>";
            echo "<script>window.open('admin.php?view_food','_self')</script>";
        }
        
     }

?>
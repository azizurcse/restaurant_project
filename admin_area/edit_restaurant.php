<?php

include ("includes/db.php");
if(isset($_GET['edit_restaurant'])){
    $get_id=$_GET['edit_restaurant'];
    
      $get_restaurant="select * from restaurant_table where restaurant_id='$get_id'";
    $run_restaurant=mysqli_query($con,$get_restaurant);
    
    
    $i=0;
    $row_restaurant=mysqli_fetch_array($run_restaurant);
        
        $restaurant_id=$row_restaurant['restaurant_id'];
        $restaurant_name=$row_restaurant['restaurant_name'];
        $restaurant_title=$row_restaurant['restaurant_title'];
        
		$restaurant_category=$row_restaurant['restaurant_category'];
        $restaurant_brand=$row_restaurant['area_category'];
		$restaurant_image=$row_restaurant['restaurant_image'];
        
        $restaurant_address=$row_restaurant['restaurant_address'];
        $restaurant_keyword=$row_restaurant['restaurant_keywords'];
        
    // restaraurant category_title
	
    $get_cat="select * from restaurant_category where restaurant_cat_id='$restaurant_category'";
    $query_cat=mysqli_query($con,$get_cat);
    $row_cat=mysqli_fetch_array($query_cat);
    $category_title=$row_cat['restaurant_cat_title'];
	
	/// restaurant area_category
	
	$get_area="select * from area_category where area_id='$restaurant_brand'";
    $query_area=mysqli_query($con,$get_area);
    $row_area=mysqli_fetch_array($query_area);
    $area_title=$row_area['area_title'];
	
	

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
                <h2>Insert Restaurant</h2>
            </div>
            <div class="row">
                <form method="post" action="" class="contact-form" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>Restaurant Name</label>
                        
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="restaurant_name" id="name" value="<?php echo $restaurant_name; ?>"/>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>Restaurant Title</label>
                        
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="restaurant_title" id="name" value="<?php echo $restaurant_title; ?>"/>
                        </div>
                    </div>
                    
                     <div class="row">
                        <div class="col span-1-of-3">
                            <label>Restaurant Category</label>
                        
                        </div>
                        <div class="col span-2-of-3">
                          <select name="restaurant_category">
                            <option><?php echo $category_title;?></option>
                              
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
                            <option><?php echo $area_title;?></option>
                              
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
                            <input type="file" name="restaurant_image" id="com_name" value="<?php echo $restaurant_name; ?>"/>
							<img src="restaurant_images/<?php echo $restaurant_image; ?>" width="55" height="55"/>
                        </div>
                    </div>
                    
                   
                    
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>Restaurant Address</label>
                        
                        </div>
                        <div class="col span-2-of-3">
                            <textarea name="restaurant_address" rows='4' cols='20' id='food_cat'><?php echo $restaurant_address; ?></textarea>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>Restaurant Keywords</label>
                        
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="restaurant_keywords" id="name" value="<?php echo $restaurant_keyword; ?>"/>
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
		 $update_id=$restaurant_id;
        $restaurant_name=$_POST['restaurant_name'];
        $restaurant_title=$_POST['restaurant_title'];
        $restaurant_category=$res_cat_id;
        $restaurant_brand=$res_area_id;
       
        $restaurant_keywords=$_POST['restaurant_keywords'];
        $restaurant_address=$_POST['restaurant_address'];
        
        
        $restaurant_image=$_FILES['restaurant_image']['name'];
        $restaurant_image_tmp=$_FILES['restaurant_image']['tmp_name'];
        move_uploaded_file($restaurant_image_tmp,"restaurant_images/$restaurant_image");
        
        
        $update_restaurant="update restaurant_table set restaurant_name='$restaurant_name',restaurant_title='$restaurant_title',
		restaurant_category='$restaurant_category',area_category='$restaurant_brand',
		restaurant_image='$restaurant_image',restaurant_address='$restaurant_address',
		restaurant_keywords='$restaurant_keywords' where restaurant_id='$update_id'";
        
        $update_restaurant_pro=mysqli_query($con,$update_restaurant);
        
        if($update_restaurant_pro)
        {
            echo "<script>alert('Restaurant updated Successfully')</script>";
            echo "<script>window.open('admin.php?view_restaurant','_self')</script>";
        }
        
     }

?>



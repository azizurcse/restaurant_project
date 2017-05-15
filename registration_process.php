<?php
session_start();
include("db.php");
if(isset($_POST['registration']))
{
   $name=$_POST['name']; 
   $email=$_POST['email']; 
   $password=$_POST['password']; 
   $image=$_FILES['image']['name'];
   $image_tmp=$_FILES['image']['tmp_name'];
   $gender=$_POST['gender']; 
   $address=$_POST['address']; 
   $city=$_POST['city']; 
  
    move_uploaded_file($image_tmp,"customers/customer_images/$image");
    $insert_customer="insert into customer_table (customer_name,customer_email,customer_password,customer_image,customer_gender,customer_address,customer_city) values ('$name','$email','$password','$image','$gender','$address','$city')";
    
    $run_query=mysqli_query($link,$insert_customer);
    
    if($run_query)
    {
        echo "<script>alert('registration is successfull')</script>";
        header("location:customer_profile.php");
        
    }else{
        echo "<script>alert('registration is failed')</script>";
    }
}

?> 
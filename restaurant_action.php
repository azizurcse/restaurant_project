<?php
session_start();
include("database_connection.php");
if(isset($_POST["area_cat"])){
	$res_query="select * from area_category";
	$run_query=mysqli_query($con,$res_query);
	 echo "<div class='nav nav-pills nav-stacked'>
				<li><a href='#' class='dropdown-toggle' data-toggle='dropdown'>area Categories</a>
				<ul class='dropdown-menu'>";
	if(mysqli_num_rows($run_query)>0){
		while($rows=mysqli_fetch_array($run_query)){
			$cat_id=$rows["area_id"];
			$cat_title=$rows["area_title"];
		echo "<li><a href='#' class='area_res' c_id='$cat_id'>$cat_title</a></li>";
		}
		echo "</ul>
						
				</li>
			</div>";
		
	}
}



if(isset($_POST["restaurant_cat"])){
	$res_query="select * from restaurant_category";
	$run_query=mysqli_query($con,$res_query);
	 echo "<div class='nav nav-pills nav-stacked'>
				<li><a href='#' class='dropdown-toggle' data-toggle='dropdown'>Reataurant Categories</a>
				<ul class='dropdown-menu'>";
	if(mysqli_num_rows($run_query)>0){
		while($rows=mysqli_fetch_array($run_query)){
			$r_cat_id=$rows["restaurant_cat_id"];
			$r_cat_title=$rows["restaurant_cat_title"];
		echo "<li><a href='#' class='res_r' rc_id='$r_cat_id'>$r_cat_title</a></li>";
		}
		echo "</ul>
						
				</li>
			</div>";
		
	}
}

if(isset($_POST["showRestaurant"])){
	$restaurant_query="SELECT * FROM restaurant_table ORDER BY RAND() LIMIT 0,6";
	$run_query=mysqli_query($con,$restaurant_query);
	if(mysqli_num_rows($run_query) > 0){
		while($row=mysqli_fetch_array($run_query)){
			$restaurant_id=$row["restaurant_id"];
			$restaurant_name=$row["restaurant_name"];
			$restaurant_cat=$row["restaurant_category"];
			$restaurant_image=$row["restaurant_image"];
			$restaurant_address=$row["restaurant_address"];
			
			echo "
			<div class='col-md-6'>
				<div class='panel panel-info'>
					<div class='panel-heading'>$restaurant_name</div>
					
						<div class='panel-body'>
							<img src='admin_area/restaurant_images/$restaurant_image' width='320px' height='150px' style='margin-left:15px;'/>
						</div>
						<div class='panel-heading'>$restaurant_address
							<button r_id='$restaurant_id' style='float:right;' id='bookmarks' class='btn btn-danger btn-xs'>Bookmark</button>
						</div>
				</div>
			</div>
			";
		}
	}
}

if(isset($_POST["get_area_cat"]) || isset($_POST["get_res_cat"]) || isset($_POST["search"])){
	if(isset($_POST["get_area_cat"])){
		$id=$_POST["r_id"];
	$sql="select * from restaurant_table where area_category='$id'";
	}else if(isset($_POST["get_res_cat"])){
		$id=$_POST["rc_id"];
	$sql="select * from restaurant_table where restaurant_category='$id'";
	}else{
		$keywords=$_POST["keyword"];
	$sql="select * from restaurant_table where restaurant_keywords like '%$keywords%'";
	}

	$run_query=mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($run_query)){
			$restaurant_id=$row["restaurant_id"];
			$restaurant_name=$row["restaurant_name"];
			$restaurant_cat=$row["restaurant_category"];
			$restaurant_image=$row["restaurant_image"];
			$restaurant_address=$row["restaurant_address"];
			
			echo "
			<div class='col-md-6'>
				<div class='panel panel-info'>
					<div class='panel-heading'>$restaurant_name</div>
						<div class='panel-body'>
							<img src='admin_area/restaurant_images/$restaurant_image' width='320px' height='150px' style='margin-left:15px;'/>
						</div>
						<div class='panel-heading'><span>$restaurant_address</span>
							<button r_id='$restaurant_id' style='float:right;' id='bookmarks' class='btn btn-danger btn-xs'>Bookmark</button>
						</div>
				</div>
			</div>
			";
		}
}



if(isset($_POST["bookmarkRestaurant"]) AND isset($_SESSION["uid"])){
	$book_id=$_POST["book_id"];
	$uid=$_SESSION["uid"];
	$sql="select * from bookmark where restaurant_id='$book_id' AND user_id='$uid'";
	$run_query=mysqli_query($con,$sql);
	$count=mysqli_num_rows($run_query);
	if($count > 0){
		echo "restaurant is bookmarked already";
	}else{
		$sql="select * from restaurant_table where restaurant_id='$book_id'";
		$run_query=mysqli_query($con,$sql);
		$row=mysqli_fetch_array($run_query);
		$res_id=$row["restaurant_id"];
		$res_name=$row["restaurant_name"];
		$res_image=$row["restaurant_image"];
		$res_add=$row["restaurant_address"];
		$sql="INSERT INTO `bookmark` (`restaurant_id`, 
		`user_id`, `restaurant_name`, `restaurant_image`, `restaurant_address`) 
		VALUES ('$res_id','$uid', '$res_name', '$res_image', '$res_add')";
		
		if(mysqli_query($con,$sql)){
			echo "Restaurant is added";
		}
	}
	
	
}

if(isset($_POST["bookmarkRestaurant"]) AND !isset($_SESSION["uid"])){
	echo "You should complete registration";
	
}

?>
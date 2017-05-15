<?php
session_start();
/*
database connection file include

*/
include "database_connection.php";

/*
start fetching category from database

*/
if(isset($_POST["category"])){
	$category_query="select * from categories";
	$run_query=mysqli_query($con,$category_query);
	echo "
		<div class='nav nav-pills nav-stacked'>
			<li class='active'><a href='#'><h4>Food Categories</h4></a></li>
	";
	
	if(mysqli_num_rows($run_query) > 0){
		while($row=mysqli_fetch_array($run_query)){
			$cid=$row["cat_id"];
			$cat_name=$row["cat_title"];
			echo "
			<li><a href='#' class='category' cid='$cid'>$cat_name</a></li>
			";
		}
		echo "</div>";
	}
}
/*
end fetching category from database

*/


/*
start fetching brand from database

*/
if(isset($_POST["brand"])){
	$brand_query="select * from brands";
	$run_query=mysqli_query($con,$brand_query);
	echo "
		<div class='nav nav-pills nav-stacked'>
			<li class='active'><a href='#'><h4>Fast Food</h4></a></li>
	";
	
	if(mysqli_num_rows($run_query) > 0){
		while($row=mysqli_fetch_array($run_query)){
			$bid=$row["brand_id"];
			$brand_name=$row["brand_title"];
			echo "
			<li><a href='#' class='selectBrand' bid='$bid'>$brand_name</a></li>
			";
		}
		echo "</div>";
	}
}
/*
end fetching brand from database

*/


/*
start fetching food data and show from database

*/
if(isset($_POST["page"])){
	$sql="select * from food_table";
	$run_query=mysqli_query($con,$sql);
	$count=mysqli_num_rows($run_query);
	$pageno=ceil($count/6);
	for($i=1;$i<=$pageno;$i++){
		echo "
		<li><a href='#' page='$i' id='page'>$i</a></li>
		";
	}
}
if(isset($_POST["getFood"])){
	$limit=6;
	if(isset($_POST["setPage"])){
		$pageno=$_POST["pageNumber"];
		$start=($pageno * $limit) - $limit;
	}else{
		$start=0;
	}
	$food_query="SELECT * FROM food_table LIMIT $start,$limit";
	$run_query=mysqli_query($con,$food_query);
	if(mysqli_num_rows($run_query) > 0){
		while($row=mysqli_fetch_array($run_query)){
			$food_id=$row["food_id"];
			$food_cat=$row["food_category"];
			$food_brand=$row["food_brand"];
			$food_name=$row["food_name"];
			$food_title=$row["food_title"];
			$food_price=$row["food_price"];
			$food_r_name=$row["food_restaurant"];
			$food_image=$row["food_image"];
			echo "
			<div class='col-md-4'>
				<div class='panel panel-info'>
					<div class='panel-heading'><span>$food_name</span>
						<a href='food_info.php?fid=$food_id' did='$food_id' style='float:right;' id='detail'>Details</a>
					</div>
					<div class='panel-body'>
						<center><img src='admin_area/food_images/$food_image' style='width:200px;height:100px'/></center>
					</div>
					<div class='panel-heading'>TK.$food_price
						<button fid='$food_id' style='float:right;' id='food' class='btn btn-danger btn-xs'>Order Now</button>
										
					</div>
				</div>
			</div>
			
			";
			
		}
		
	}
}
/*
end fetching food data and show from database

*/


/*
start clicking category and fetching food data and show from database

*/

if(isset($_POST["get_selected_Category"]) || isset($_POST["selectBrand"]) || isset($_POST["search"])){
	
	// it is the category clicking php process 
	
	if(isset($_POST["get_selected_Category"])){
		$id=$_POST["cat_id"];
		$sql="SELECT * FROM food_table WHERE food_category='$id'";
		
	}else if(isset($_POST["selectBrand"])){
		// it is the brand clicking php process
		
		$id=$_POST["brand_id"];
		$sql="SELECT * FROM food_table WHERE food_brand='$id'";
	}else{
		// it is the search function php process
		$keyword=$_POST["keyword"];
		$sql="SELECT * FROM food_table WHERE food_keywords LIKE '%$keyword%'";
	}
	
	$run_query=mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($run_query)){
		
			$food_id=$row["food_id"];
			$food_cat=$row["food_category"];
			$food_brand=$row["food_brand"];
			$food_name=$row["food_name"];
			$food_title=$row["food_title"];
			$food_price=$row["food_price"];
			$food_r_name=$row["food_restaurant"];
			$food_image=$row["food_image"];
			echo "
			<div class='col-md-4'>
				<div class='panel panel-info'>
					<div class='panel-heading'><span>$food_name</span>
						<a href='food_info.php?fid=$food_id' did='$food_id' style='float:right;' id='detail'>Details</a>
					</div>
					<div class='panel-body'>
						<center><img src='admin_area/food_images/$food_image' width='200' height='100'/></center>
					</div>
					<div class='panel-heading'>TK.$food_price
						<button fid='$food_id' style='float:right;' id='food' class='btn btn-danger btn-xs'>Order Now</button>
										
					</div>
				</div>
			</div>
			
			";
			
		}
	}
	
/*
end clicking category search brand and fetching food data and show from database

*/


/*
start order processing  in  database

*/


if(isset($_POST["addOrder"]) AND isset($_SESSION["uid"])){
	$f_id=$_POST["food_id"];
	$user_id=$_SESSION["uid"];
	$sql="select * from order_table where f_id='$f_id' AND user_id='$user_id'";
	$run_query=mysqli_query($con,$sql);

	$count=mysqli_num_rows($run_query);
	if($count > 0){
		echo "Food is in your order list";
	}else{
		$user_id=$_SESSION["uid"];
		$c_sql="select * from user_info where user_id='$user_id'";
		$c_run_query=mysqli_query($con,$c_sql);
		$c_row=mysqli_fetch_array($c_run_query);
		$c_email=$c_row['email'];
		
		$sql="select * from food_table where food_id='$f_id'";
		$run_query=mysqli_query($con,$sql);
		$row=mysqli_fetch_array($run_query);
		$food_id=$row["food_id"];
		$food_name=$row["food_name"];
		$food_image=$row["food_image"];
		$food_price=$row["food_price"];
		
		$sql="INSERT INTO `order_table` (`f_id`, `ip_add`, 
		`user_id`,`user_email`, `food_title`, `food_image`, `quantity`, `price`, 
		`total_amount`) VALUES ('$f_id', '0', '$user_id', '$c_email', '$food_name', '$food_image',
		'1', '$food_price', '$food_price')";
		
	
		if(mysqli_query($con,$sql)){
			echo "food is added";
		}
	}
}

if(isset($_POST["addOrder"]) AND !isset($_SESSION["uid"])){
	echo "You should complete registration";
	
}

/*
end order processing  in  database

*/


/*
start order processing  and show the order page 

*/

if(isset($_POST["get_order_food"]) || isset($_POST["order_checkout"]) AND isset($_SESSION["uid"])){
	$uid=$_SESSION["uid"];
	$sql="select * from order_table where user_id='$uid'";
	$run_query=mysqli_query($con,$sql);
	$count=mysqli_num_rows($run_query);
	if($count > 0){
		$no=1;
		$total_amt=0;
		while($row=mysqli_fetch_array($run_query)){
			$id=$row["id"];
			$food_id=$row["f_id"];
			$food_name=$row["food_title"];
			$food_image=$row["food_image"];
			$qty=$row["quantity"];
			$food_price=$row["price"];
			$total=$row["total_amount"];
			$price_array=array($total);
			$total_sum=array_sum($price_array);
			$total_amt=$total_amt+$total_sum;
			if(isset($_POST["get_order_food"])){
			// user can see their order item
				echo "
				<div class='row'>
					<div class='col-md-3'>$no</div>
					<div class='col-md-3'><img src='admin_area/food_images/$food_image' width='60px' height='50px'/></div>
					<div class='col-md-3'>$food_name</div>
					<div class='col-md-3'>TK.$food_price.00</div>
											
				</div>
			";
			
			}else{
				// user can see their order item and update 
				echo "
					<div class='row'>
						<div class='col-md-2'>
							<div class='btn-group'>
								<a href='#' remove_id='$food_id' class='btn btn-danger remove'><span class='glyphicon glyphicon-trash'></span></a>
								<a href='#' update_id='$food_id' class='btn btn-primary update'><span class='glyphicon glyphicon-ok-sign'></span></a>
							</div>
						</div>
						<div class='col-md-2'><img src='admin_area/food_images/$food_image' width='50px' height='60px'/></div>
						<div class='col-md-2'>$food_name</div>
						<div class='col-md-2'><input type='text' class='form-control qty' fid='$food_id' id='qty-$food_id' value='$qty'></div>
						<div class='col-md-2'><input type='text' class='form-control price' fid='$food_id' id='price-$food_id' value='$food_price' disabled></div>
						<div class='col-md-2'><input type='text' class='form-control total' fid='$food_id' id='total-$food_id' value='$total' disabled></div>
					</div>
					
				";
			}
			
			$no=$no+1;
		}
		
		if(isset($_POST["order_checkout"])){
			$uid=$_SESSION["uid"];
			$sql="select * from order_table where user_id='$uid'";
			$run_query=mysqli_query($con,$sql);
			$row=mysqli_fetch_array($run_query);
			
		
			echo "
				<div class='row'>
					<div class='col-md-8'></div>
						<div class='col-md-4'>
							<b>Total: $total_amt Tk</b>
						</div>
					</div>
				</div>
				<div class='btn btn-success' style='float:left;'><a href='profile.php' style='list-style:none;text-decoration:none;color:white;'>Continue Ordering</a></div>
				<div><a href='order_list.php?user_id=$uid' class='btn btn-success' style='float:right;'>Confirm Order</a></div>
			";
		}
	}
}
/*
end order processing  and show the order page 

*/
if(isset($_POST["order_count"]) AND isset($_SESSION["uid"])){
	$uid=$_SESSION["uid"];
	$sql="select * from order_table where user_id='$uid'";
	$run_query=mysqli_query($con,$sql);
	echo $count=mysqli_num_rows($run_query);
	
}
if(isset($_POST["removeFromOrder"])){
	$f_id=$_POST["removeId"];
	$uid=$_SESSION["uid"];
	$sql="delete from order_table where user_id='$uid' AND f_id='$f_id'";
	$run_query=mysqli_query($con,$sql);
	if($run_query){
		echo "
			<div class='alert alert-danger'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Food is Reomoved from Order</b>
				</div>
		";
	}
}



if(isset($_POST["updateFood"])){
	$uid=$_SESSION["uid"];
	$f_id=$_POST["updateId"];
	$qty=$_POST["qty"];
	$price=$_POST["price"];
	$total=$_POST["total"];
	
	$sql="UPDATE order_table set quantity='$qty',price='$price',total_amount='$total' where user_id='$uid' AND f_id='$f_id'";
	$run_query=mysqli_query($con,$sql);
	if($run_query){
		echo "
		<div class='alert alert-success'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Food is updated</b>
				</div>
		";
	}
}



// restaurant area


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



if(isset($_POST["pager"])){
	$sql="select * from restaurant_table";
	$run_query=mysqli_query($con,$sql);
	$count=mysqli_num_rows($run_query);
	$pagenoR=ceil($count/6);
	for($i=1;$i<=$pagenoR;$i++){
		echo "<li><a href='#' pageR='$i' id='pageres'>$i</a></li>";
	}  
}
if(isset($_POST["showRestaurant"])){
	$rlimit=6;
	if(isset($_POST["setRpage"])){
		$pagenoR=$_POST["pageRnumber"];
		$rstart=($pagenoR*$rlimit)-$rlimit;
	}else{
		$rstart=0;
	}
	$restaurant_query="SELECT * FROM restaurant_table LIMIT $rstart,$rlimit";
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
					<div class='panel-heading'><span>$restaurant_name</span>
					<a href='restaurant_info.php?rid=$restaurant_id' drid='$restaurant_id' style='float:right;' id='detail'>Details</a>
					</div>
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
					<div class='panel-heading'><span>$restaurant_name</span>
					
						<a href='restaurant_info.php?rid=$restaurant_id' style='float:right;'>Details</a>
					</div>
					
					</div>
					
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

if(isset($_POST["showBook"]) AND isset($_SESSION["uid"])){
	$uid=$_SESSION["uid"];
	$sql="select * from bookmark where user_id='$uid'";
	$run_query=mysqli_query($con,$sql);
	$count=mysqli_num_rows($run_query);
	if($count > 0){
		$no = 1;
		while($row=mysqli_fetch_array($run_query)){
			$b_id=$row["bookmark_id"];
			$res_id=$row["restaurant_id"];
			$user_id=$row["user_id"];
			$res_name=$row["restaurant_name"];
			$res_image=$row["restaurant_image"];
			
			echo "
				<div class='row'>
					<div class='col-md-6'>$no</div>
					<div class='col-md-6'><img src='admin_area/restaurant_images/$res_image'/ width='50px' height='60px'></div>
											
				</div>
			";
			$no=$no+1;
		}
		
	}
}

if(isset($_POST["bookmark_count"]) AND isset($_SESSION["uid"])){
	$uid=$_SESSION["uid"];
	$sql="select * from bookmark where user_id='$uid'";
	$run_query=mysqli_query($con,$sql);
	echo mysqli_num_rows($run_query);
	
}
?>








$(document).ready(function(){
	cat();
	brand();
	food();
// this category calling function method
	function cat(){
		$.ajax({
			url		:"process.php",
			method	:"POST",
			data	:{category:1},
			success :function(data){
				$("#get_category").html(data);
			}
		})
	}
	
	// this brand calling function method
	
	function brand(){
		$.ajax({
			url		:"process.php",
			method	:"POST",
			data	:{brand:1},
			success	:function(data){
				$("#get_brand").html(data);
			}
		})
	}
	// this food calling function method
	
	function food(){
		$.ajax({
			url		:"process.php",
			method	:"POST",
			data	:{getFood:1},
			success	:function(data){
				$("#get_food").html(data);
			}
		})
	}
	
	// this category clicking  function method to ajax
	
	$("body").delegate(".category","click",function(event){
		event.preventDefault();
		var cid=$(this).attr('cid');
			$.ajax({
			url		:"process.php",
			method	:"POST",
			data	:{get_selected_Category:1,cat_id:cid},
			success	:function(data){
				$("#get_food").html(data);
			}
		
		})
	})
	// it is the brand select function and how it works php process
	
		$("body").delegate(".selectBrand","click",function(event){
		event.preventDefault();
		var bid=$(this).attr('bid');
			$.ajax({
			url		:"process.php",
			method	:"POST",
			data	:{selectBrand:1,brand_id:bid},
			success	:function(data){
				$("#get_food").html(data);
			}
		
		})
	})
	// it is the search function and how it works php process
	$("#search_btn").click(function(){
		var keyword=$("#search").val();
		if(keyword !=""){
			$.ajax({
				url		:"process.php",
				method	:"POST",
				data	:{search:1,keyword:keyword},
				success	:function(data){
					$("#get_food").html(data);
				}
			
			})
		}
	})
	// it is the sign up function and how it works ajax process
	$("#signup_button").click(function(event){
		event.preventDefault();
		$.ajax({
				url		:"register_process.php",
				method	:"POST",
				data	:$("form").serialize(),
				success	:function(data){
					$("#signup_msg").html(data);
				}
			
			})
	})
	// it is the login function and how it works ajax process
	$("#login").click(function(event){
		event.preventDefault();
		var email=$("#email").val();
		var pass=$("#password").val();
		$.ajax({
			url		:"login.php",
			method	:"POST",
			data	:{userLogin:1,userEmail:email,userPassword:pass},
			success	:function(data){
				if(data == "Trueddddd"){
					window.location.href="dashboard.php";
				}
			}
		})
	})
	// it is the  order the food function in database and how it works ajax process
	order_count();
	$("body").delegate("#food","click",function(event){
		event.preventDefault();
		var f_id=$(this).attr('fid');
		$.ajax({
			url		:"process.php",
			method	:"POST",
			data	:{addOrder:1,food_id:f_id},
			success	:function(data){
				alert(data);
				//$("#food_msg").html(data);
				order_count();
			}
		})
	})
	
	// extra click
	$("body").delegate("#food","click",function(event){
		event.preventDefault();
		var f_id=$(this).attr('fid');
		$.ajax({
			url		:"process.php",
			method	:"POST",
			data	:{addOrder:1,food_id:f_id},
			success	:function(data){
				alert(data);
			}
		})
	})
	
	
	// show te order section in tab bar
	order_container();
	function order_container(){
		$.ajax({
			url:"process.php",
			method:"POST",
			data:{get_order_food:1},
			success:function(data){
				$("#order_food").html(data);
			}
		})
		
	};
	function order_count(){
		$.ajax({
			url:"process.php",
			method:"POST",
			data:{order_count:1},
			success:function(data){
				$(".orders_i").html(data);
			}
		})
	}
	
	// it is the order the food and show in order page function and how it works ajax process
	$("#order_container").click(function(event){
		event.preventDefault();
		$.ajax({
			url		:"process.php",
			method	:"POST",
			data	:{get_order_food:1},
			success	:function(data){
				$("#order_food").html(data);
			}
		})
	})
	// it is the order check out function and how it works ajax process
	order_checkout();
	function order_checkout(){
		$.ajax({
			url:"process.php",
			method:"POST",
			data:{order_checkout:1},
			success:function(data){
				$("#order_checkout").html(data);
			}
		})
	}
	// it is the order quantity increase or descrease function and how it works ajax process
	$("body").delegate(".qty","keyup",function(){
		var fid=$(this).attr("fid");
		var qty=$("#qty-"+fid).val();
		var price=$("#price-"+fid).val();
		var total=qty*price;
		
		$("#total-"+fid).val(total);
	})
	// it is the delete order food function and how it works ajax process
	$("body").delegate(".remove","click",function(event){
		event.preventDefault();
		var fid=$(this).attr("remove_id");
		$.ajax({
			url:"process.php",
			method:"POST",
			data:{removeFromOrder:1,removeId:fid},
			success:function(data){
				$("#order_msg").html(data);
				order_checkout();
				
			}
		})
	})
	// it is the update order food function and how it works ajax process
	$("body").delegate(".update","click",function(event){
		event.preventDefault();
		var fid=$(this).attr("update_id");
		var qty=$("#qty-"+fid).val();
		var price=$("#price-"+fid).val();
		var total=$("#total-"+fid).val();
		$.ajax({
			url:"process.php",
			method:"POST",
			data:{updateFood:1,updateId:fid,qty:qty,price:price,total:total},
		success:function(data){
			$("#order_msg").html(data);
			order_checkout();
		}
		})
	})
	pagef();
	function pagef(){
		$.ajax({
			url:"process.php",
			method:"POST",
			data:{page:1},
			success:function(data){
				$("#pageno").html(data);
			}
		})
	}
	$("body").delegate("#page","click",function(){
		var pn=$(this).attr("page");
		$.ajax({
			url:"process.php",
			method:"POST",
			data:{getFood:1,setPage:1,pageNumber:pn},
			success:function(data){
				$("#get_food").html(data);
			}
		})
	})
	
	
   
   // restaurnt area
   area_category();
	restaurant_category();
	fetch_restaurant();
	function area_category(){
		$.ajax({
			url:"process.php",
			method:"POST",
			data:{area_cat:1},
			success:function(data){
				$("#get_area").html(data);
			}
		})
	}
	
	
	
	function restaurant_category(){
		$.ajax({
			url:"process.php",
			method:"POST",
			data:{restaurant_cat:1},
			success:function(data){
				$("#get_restaurant").html(data);
			}
		})
	}
	
	
	function fetch_restaurant(){
		$.ajax({
			url:"process.php",
			method:"POST",
			data:{showRestaurant:1},
			success:function(data){
				$("#fetch_restaurant").html(data);
			}
		})
	}
	
	$("body").delegate(".area_res","click",function(event){
		event.preventDefault();
		var c_id=$(this).attr('c_id');
		$.ajax({
			url:"process.php",
			method:"POST",
			data:{get_area_cat:1,r_id:c_id},
			success:function(data){
				$("#fetch_restaurant").html(data);
			}
		})
	})
	
	
	$("body").delegate(".res_r","click",function(event){
		event.preventDefault();
		var rc_id=$(this).attr('rc_id');
		$.ajax({
			url:"process.php",
			method:"POST",
			data:{get_res_cat:1,rc_id:rc_id},
			success:function(data){
				$("#fetch_restaurant").html(data);
			}
		})
	})
	
	$("#search_btn").click(function(){
		var keyword=$("#search").val();
		if(keyword != ""){
			$.ajax({
			url:"process.php",
			method:"POST",
			data:{search:1,keyword:keyword},
			success:function(data){
				$("#fetch_restaurant").html(data);
			}
		})
		}
	})
   bookmark_count();
   $("body").delegate("#bookmarks","click",function(event){
	  event.preventDefault();
		var b_id=$(this).attr('r_id');
			$.ajax({
				url:"process.php",
				method:"POST",
				data:{bookmarkRestaurant:1,book_id:b_id},
				success:function(data){
					alert(data);
					bookmark_count();
				}
			})
   })
   book_container();
   function book_container(){
	   $.ajax({
				url:"process.php",
				method:"POST",
				data:{showBook:1},
				success:function(data){
					$("#book_res").html(data);
				}
			})
			
   };
   
   function bookmark_count(){
	   $.ajax({
				url:"process.php",
				method:"POST",
				data:{bookmark_count:1},
				success:function(data){
					$(".books").html(data);
				}
			})
   }
   
   $("#book_container").click(function(event){
	   event.preventDefault();
	   $.ajax({
				url:"process.php",
				method:"POST",
				data:{showBook:1},
				success:function(data){
					$("#book_res").html(data);
				}
			})
   })
   
   page();
   function page(){
	   $.ajax({
		   url:"process.php",
		   method:"POST",
		   data:{pager:1},
		   success:function(data){
			   $("#pagenoRe").html(data);
			   
		   }
	   })
   }
   
   $("body").delegate("#pageres","click",function(){
	   var pageNo=$(this).attr("pageR");
	   $.ajax({
		   url:"process.php",
		   method:"POST",
		   data:{showRestaurant:1,setRpage:1,pageRnumber:pageNo},
		   success:function(data){
			   $("#fetch_restaurant").html(data);
			   
		   }
	   })
   })
   
})
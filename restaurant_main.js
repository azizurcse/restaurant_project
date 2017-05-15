$(document).ready(function(){
	
	area_category();
	restaurant_category();
	fetch_restaurant();
	function area_category(){
		$.ajax({
			url:"restaurant_action.php",
			method:"POST",
			data:{area_cat:1},
			success:function(data){
				$("#get_area").html(data);
			}
		})
	}
	
	
	
	function restaurant_category(){
		$.ajax({
			url:"restaurant_action.php",
			method:"POST",
			data:{restaurant_cat:1},
			success:function(data){
				$("#get_restaurant").html(data);
			}
		})
	}
	
	
	function fetch_restaurant(){
		$.ajax({
			url:"restaurant_action.php",
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
			url:"restaurant_action.php",
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
			url:"restaurant_action.php",
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
			url:"restaurant_action.php",
			method:"POST",
			data:{search:1,keyword:keyword},
			success:function(data){
				$("#fetch_restaurant").html(data);
			}
		})
		}
	})
   
   $("body").delegate("#bookmarks","click",function(event){
	  event.preventDefault();
		var b_id=$(this).attr('r_id');
			$.ajax({
				url:"restaurant_action.php",
				method:"POST",
				data:{bookmarkRestaurant:1,book_id:b_id},
				success:function(data){
					
				}
			})
   })
})
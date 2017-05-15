<?php
require_once 'db_class.php';

class User{
    
    public function __construct(){
     $db=new Db_Class();   
    }
    
    public function save_user($data)
        
    {
        
        $password=md5($data['password']);
        $query="insert into user_table (user_name,user_email,user_password,user_image,user_com_name,user_gender,user_address,user_city) values ('$data[name]','$data[email]','$password',$data[com_name]','$data[gender]','$data[address]','$data[city]')";
        
       
        if(!mysql_query($query))
        {
            echo mysql_error();
            die('sql error');
        }else{
            echo 'save user successfully';
        }
        
    }
}


?>
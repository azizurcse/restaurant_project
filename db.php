<?php

$link=mysqli_connect('localhost','root','','project');

if(mysqli_connect_errno())
{
    echo"failed to connect to mysql:" .mysqli_connect_error();
}


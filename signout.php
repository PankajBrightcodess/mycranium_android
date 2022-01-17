<?php 
	unset($_COOKIE["Cookie"]);
    unset($_COOKIE["Brightcodess_com"]);
    unset($_COOKIE["PHPSESSID"]);

    if(empty($_COOKIE['Cookie'])){
    	header('location:index.php?check=1');
    }
    else{
    	header('location:home.php');
    }

	
?>
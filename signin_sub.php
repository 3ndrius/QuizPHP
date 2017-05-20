<?php
include("class/users.php");
$signin = new users;
extract($_POST);
if ($signin->signin($e,$p)) {
    
    if($email=="admin@gmail.com" and $pass="admin"){
        $this->url("/admin_panel/index.php");
        }
    else{
      
    
    $signin->url("home.php");
    }
}
else {
    $signin->url("index.php?run=failed");
}




?>
<?php 
session_start();

$u = "admin@gmail.com";
$p = "admin";

require_once __DIR__.'/database.php';
require_once __DIR__.'/routes.php';

if (strpos($path, "/v/") !== false) {
    require_once __DIR__.'/detail.php';
}else if(isset($_SESSION['login'])&&strpos($path, "/superadmin") !== false){
    require_once __DIR__.'/admin/admin.php';

}else if(strpos($path, "/superadmin") !== false){
    
    if(isset($_POST['login'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        if($username == $u && $password  == $p){
            $_SESSION['login']=true;
        }else{
            echo "<span style='color:red'>Mật khẩu không đúng</span>";
        }
    }
    if(!isset($_SESSION['login'])){
        require_once __DIR__.'/admin/login.php';
    }else{
    require_once __DIR__.'/admin/admin.php';
    }
}else{
    require_once __DIR__.'/phim.php';
  }

?>
<?php
$limit = 12;
$http= $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST'];


$fullPath =$_SERVER['REQUEST_URI'];

if($fullPath  =="/"){
  $fullPath = '/cat/263';
}
  $path  =  $fullPath;

if(isset($_GET['page'])){
  $path  = str_replace('?page='.$_GET['page'],'',$fullPath);
}
if (strpos($path, "/v/") !== false) {
  $sqlVideo = "SELECT url_movie,name,content,meta_description FROM movie WHERE url_movie_origin like '%$path%'LIMIT 1";
  
  $video = $conn->query($sqlVideo)->fetch_row();
  
  $title = $video[1];

  // header("Location: https://video.getlinktraffic.space/?url=".$video[0]);
}
$sql = "SELECT name, link,id FROM category";
$categories = $conn->query($sql);


if(strpos($path, "/superadmin/phim") !== false){
  $page = 1;
  $limit = 5;

  if(isset($_GET['page'])){
    $page=$_GET['page'];
  }
  $offset =  ($page-1) * $limit;  

  $sqlPhim = "SELECT * FROM movie ORDER BY id DESC LIMIT $limit OFFSET $offset ";
  
  $phim = $conn->query($sqlPhim);
  
  $sqlPhimCount = "SELECT COUNT(*) FROM movie ";
  $phimCount = $conn->query($sqlPhimCount)->fetch_row()[0];
}else{
 
  $sqlCat = "SELECT id,name FROM category WHERE link like '%$path%'LIMIT 1";

  
  $cate = $conn->query($sqlCat)->fetch_row();
  
  $phim = [];
  $phimCount = 0;

  if($cate){
    $title = $cate[1];
    $page = 1;
    if(isset($_GET['page'])){
      $page=$_GET['page'];
    }
    $offset =  ($page-1) * $limit;  
    $id = $cate[0];
    $sqlPhim = "SELECT * FROM movie WHERE category_id like '%$id%'  LIMIT $limit OFFSET $offset";
    $phim = $conn->query($sqlPhim);

    $sqlPhimCount = "SELECT COUNT(*)  FROM movie WHERE category_id like '%$id%' ";
    $phimCount = $conn->query($sqlPhimCount)->fetch_row()[0];
  }else{
    $sqlCat = "SELECT id,name FROM category LIMIT 1";
    $cate = $conn->query($sqlCat)->fetch_row();
    $title = $cate[1];
    
    $sqlPhim = "SELECT * FROM movie ORDER BY RAND()  LIMIT $limit ";
    $phim = $conn->query($sqlPhim);
  }
}
 



?>

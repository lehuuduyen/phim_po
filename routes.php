<?php
$limit = 12;
$http = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'];
$messageError ='';

$fullPath = $_SERVER['REQUEST_URI'];
$fullHttp = $http . $fullPath;
$title = 'Pornlulu';
$searchCate = '';
$searchTitle = '';
$path  =  $fullPath;

if (isset($_GET['page'])) {
  $path  = str_replace('?page=' . $_GET['page'], '', $path);
}
if (isset($_GET['q'])) {
  $path  = str_replace('?q=' . $_GET['q'], '', $path);
}
if (strpos($path, "/movie/") !== false) {
  $query = str_replace('/movie/','',$path);

  $sqlVideo = "SELECT url_movie,name,content,meta_description,image FROM movie WHERE url_movie_origin = '$query' LIMIT 1";

  $video = $conn->query($sqlVideo)->fetch_row();
 
  
  $title = $video[1];
  $rand = rand(100, 10000);
  $fullImg = $http . '/' . $video[4];

  $schema = "<script type='application/ld+json'>
  {
      '@context': 'https://schema.org',
      '@type': 'Article',
      'aggregateRating': {
        '@type': 'AggregateRating',
        'ratingValue': '5',
        'reviewCount': '$rand'
      }
      'headline': '$video[1]',
      'description': '$video[3]',
      'image': '$fullImg',
      'author': {
          '@type': 'Person',
          'name': 'PORNLULU'
      },
  }
</script>";

  // header("Location: https://video.getlinktraffic.space/?url=".$video[0]);
}
if (strpos($path, "/blog/") !== false) {
 
  $query = str_replace('/blog/','',$path);
  $sqlVideo = "SELECT id,name,content,meta_description,image FROM blog WHERE slug = '$query' AND status = 1 LIMIT 1";

  $video = $conn->query($sqlVideo)->fetch_row();
  $title = $video[1];
  $titleCate = $video[1];
  $fullImg = $http . '/' . $video[4];
  $rand = rand(100, 10000);
  $schema = "<script type='application/ld+json'>
  {
      '@context': 'https://schema.org',
      '@type': 'Article',
      'aggregateRating': {
        '@type': 'AggregateRating',
        'ratingValue': '5',
        'reviewCount': '$rand'
      }
      'headline': '$video[1]',
      'description': '$video[3]',
      'image': '$fullImg',
      'author': {
          '@type': 'Person',
          'name': 'PORNLULU'
      },
  }
</script>";
  // header("Location: https://video.getlinktraffic.space/?url=".$video[0]);
}
$sql = "SELECT * FROM category";
$categories = $conn->query($sql);



if (strpos($path, "/superadmin/phim") !== false) {
  $page = 1;
  $limit = 5;

  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  }
  $offset =  ($page - 1) * $limit;

  $sqlPhim = "SELECT * FROM movie ORDER BY id DESC LIMIT $limit OFFSET $offset ";
  // like '%$path%'
  $phims = [];
  $count =0;

  if(isset($_GET['category'])){
    $searchCate = $_GET['category'];
    $searchTitle = $_GET['title'];
    $sqlPhim = "SELECT * FROM movie  WHERE name like '%$searchTitle%'  ORDER BY id DESC LIMIT $limit OFFSET $offset ";
    $sqlPhimCount = "SELECT * FROM movie WHERE name like '%$searchTitle%'";
    $sqlPhimCount = $conn->query($sqlPhimCount);

    foreach($sqlPhimCount as $key => $value){
      $listCate = $value['category_id'];
      $cate = "SELECT GROUP_CONCAT(name) AS category_name FROM category where id in ($listCate)";
      $cate = $conn->query($cate);
      $cateName= '';
      if($cate){
        $row = mysqli_fetch_assoc($cate);
        $cateName = $row['category_name'];
      }
      if($searchCate){
        $position = stripos($cateName, $searchCate);
        if($position=== false){
          continue;
        }
      }
      $count++;
    }
  }else{
    $count = "SELECT COUNT(*) FROM movie ";
    $count = $conn->query($count)->fetch_row()[0];
  }
  $phim = $conn->query($sqlPhim);

  foreach($phim as $key => $value){
    $listCate = $value['category_id'];
    $cate = "SELECT GROUP_CONCAT(name) AS category_name FROM category where id in ($listCate)";
    $cate = $conn->query($cate);
   
    
    $cateName= '';

    if($cate){
      $row = mysqli_fetch_assoc($cate);
      $cateName = $row['category_name'];
    }
    if($searchCate){
      $position = stripos($cateName, $searchCate);
      if($position=== false){
        continue;
      }
    }
    if($searchTitle){
      $position = stripos($value['name'], $searchTitle);
      if($position=== false){
        continue;
      }
    }
    $phims[$key]= $value;
    $phims[$key]['category_name']= $row['category_name'];
  }

  
  
  $phimCount = $count;
} else if (strpos($path, "/superadmin/blog") !== false) {
  $page = 1;
  $limit = 5;

  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  }
  $offset =  ($page - 1) * $limit;

  $sqlPhim = "SELECT * FROM blog ORDER BY id DESC LIMIT $limit OFFSET $offset ";

  $phim = $conn->query($sqlPhim);

  $sqlPhimCount = "SELECT COUNT(*) FROM blog ";
  $phimCount = $conn->query($sqlPhimCount)->fetch_row()[0];
} else {

  $sqlCat = "SELECT * FROM category WHERE link like '%$path%'LIMIT 1";
  

  $cate = $conn->query($sqlCat)->fetch_row();

  $phim = [];
  $phimCount = 0;
  
  if ($cate) {
    $titleCate = $cate[1];
    $page = 1;
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
    }
    $offset =  ($page - 1) * $limit;
    $id = $cate[0];
    if (isset($_GET['q'])) {
      $q = $_GET['q'];
      $sqlPhim = "SELECT * FROM movie WHERE category_id = $id AND name like '%$q%' LIMIT $limit OFFSET $offset";
      $phim = $conn->query($sqlPhim);
      $sqlPhimCount = "SELECT COUNT(*)  FROM movie WHERE category_id = $id  AND name like '%$q%' ";
      $phimCount = $conn->query($sqlPhimCount)->fetch_row()[0];
    } else {
      $sqlPhim = "SELECT * FROM movie WHERE category_id like '%$id%'  LIMIT $limit OFFSET $offset";
      $phim = $conn->query($sqlPhim);

      $sqlPhimCount = "SELECT COUNT(*)  FROM movie WHERE category_id like '%$id%' ";
      $phimCount = $conn->query($sqlPhimCount)->fetch_row()[0];
    }
    if (strpos($path, "/cat/") !== false) {
      $title = $cate[3];
      $keyword = $cate[5];
      $video[3] = $cate[4];
    }
  } else if (strpos($path, "/blog") !== false) {
    $limit = 8;

    $sqlPhim = "SELECT * FROM blog ORDER BY RAND()  LIMIT $limit ";
    $phim = $conn->query($sqlPhim);

    // header("Location: https://video.getlinktraffic.space/?url=".$video[0]);
  } else if (strpos($path, "/list_blog") !== false) {
    $limit = 8;
    $titleCate = "";
    $page = 1;
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
    }
    $offset =  ($page - 1) * $limit;
    $id = $cate[0];
    $sqlPhim = "SELECT * FROM blog  LIMIT $limit OFFSET $offset";
    $phim = $conn->query($sqlPhim);

    $sqlPhimCount = "SELECT COUNT(*)  FROM blog ";
    $phimCount = $conn->query($sqlPhimCount)->fetch_row()[0];

    // header("Location: https://video.getlinktraffic.space/?url=".$video[0]);
  } else {
   
    
    
    $sqlCat = "SELECT * FROM category LIMIT 1";
    $cate = $conn->query($sqlCat)->fetch_row();
    $titleCate = $cate[1];
  
    $sqlPhim = "SELECT * FROM movie ORDER BY RAND()  LIMIT $limit ";
    $phim = $conn->query($sqlPhim);
  }
}


    
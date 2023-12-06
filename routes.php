<?php
$limit = 12;
$http = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'];


$fullPath = $_SERVER['REQUEST_URI'];

if ($fullPath  == "/") {
  $fullPath = '/cat/263';
}
$path  =  $fullPath;

if (isset($_GET['page'])) {
  $path  = str_replace('?page=' . $_GET['page'], '', $fullPath);
}
if (strpos($path, "/v/") !== false) {
  $sqlVideo = "SELECT url_movie,content,meta_description FROM movie WHERE url_movie_origin like '%$path%'LIMIT 1";

  $video = $conn->query($sqlVideo)->fetch_row();
  $title = $video[1];
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
  $sqlVideo = "SELECT id,name,content,meta_description,image FROM blog WHERE slug like '%$path%' AND status = 1 LIMIT 1";

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
if (strpos($path, "/superadmin/phim") !== false) {
  $page = 1;
  $limit = 5;

  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  }
  $offset =  ($page - 1) * $limit;

  $sqlPhim = "SELECT * FROM movie LIMIT $limit OFFSET $offset ";
  $phim = $conn->query($sqlPhim);

  $sqlPhimCount = "SELECT COUNT(*) FROM movie ";
  $phimCount = $conn->query($sqlPhimCount)->fetch_row()[0];
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
  $sql = "SELECT name, link,id FROM category";
  $categories = $conn->query($sql);

  $sqlCat = "SELECT id,name FROM category WHERE link like '%$path%'LIMIT 1";
  $cate = $conn->query($sqlCat)->fetch_row();

  $phim = [];
  if ($cate) {
    $title = $cate[1];

    $page = 1;
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
    }
   
    
    $offset =  ($page - 1) * $limit;
    $id = $cate[0];
    $sqlPhim = "SELECT * FROM movie WHERE category_id = $id LIMIT $limit OFFSET $offset";
    $phim = $conn->query($sqlPhim);
    $sqlPhimCount = "SELECT COUNT(*)  FROM movie WHERE category_id = $id";
    $phimCount = $conn->query($sqlPhimCount)->fetch_row()[0];
  }else if (strpos($path, "/blog") !== false) {
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
  }  else {
    $sqlPhim = "SELECT * FROM movie ORDER BY RAND()  LIMIT $limit ";
    $phim = $conn->query($sqlPhim);
  }
}

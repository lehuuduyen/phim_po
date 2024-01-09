<?php


require_once __DIR__.'/header.php';
        ?>
        <!-- End of Sidebar -->

       
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                <?php
                
                if(strpos($path, "/superadmin/phim") !== false){
                    require_once __DIR__.'/phim/list.php';
                }else if(strpos($path, "/superadmin/blog") !== false){
                    require_once __DIR__.'/blog/list.php';
                }else if(strpos($path, "/superadmin") !== false ){
                  require_once __DIR__.'/category/list.php';
              }
                ?>
                   
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
    require_once __DIR__.'/footer.php';
            
    $sqlPhim = "SELECT * FROM movie ";
    $phim = $conn->query($sqlPhim);

    $url = $http;
    $pathSitemap = '/var/www/html/web_phim/main/sitemap.xml';
    $file_handler = fopen($pathSitemap, 'w');

 
    $xml = '<?xml version="1.0" encoding="UTF-8"?>
    <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
    $xml.='<url>
        <loc>'.$url.'</loc>
        <lastmod>'.date("Y-m-d").'</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
      </url>';
      $xml.='<url>
      <loc>'.$url.'/list_blog</loc>
      <lastmod>'.date("Y-m-d").'</lastmod>
      <changefreq>monthly</changefreq>
      <priority>0.8</priority>
    </url>';
      foreach($phim as $value){
        $xml.='<url>
        <loc>'.$url.$value['url_movie_origin'].'</loc>
        <lastmod>'.date('Y-m-d').'</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
      </url>';
      }
    $sqlCate = "SELECT * FROM category ";
    $cate = $conn->query($sqlCate);
    foreach($cate as $value){
        $xml.='<url>
        <loc>'.$url.$value['link'].'</loc>
        <lastmod>'.date('Y-m-d').'</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
      </url>';
      }
      $sqlBlog = "SELECT * FROM blog ";
    $blogs = $conn->query($sqlBlog);
    foreach($blogs as $value){
        $xml.='<url>
        <loc>'.$url.$value['slug'].'</loc>
        <lastmod>'.date('Y-m-d').'</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
      </url>';
      }
    $xml.='</urlset>';
    
    
    fwrite($file_handler, $xml);
        ?>
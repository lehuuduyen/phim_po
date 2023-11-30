<?php


require_once __DIR__.'/header.php';
        ?>
        <!-- End of Sidebar -->

       
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                <?php
                if($fullPath == "/superadmin" ||$fullPath == "/superadmin/"){
                    require_once __DIR__.'/category/list.php';
                }
                if(strpos($path, "/superadmin/phim") !== false){
                    require_once __DIR__.'/phim/list.php';
                }
                ?>
                   
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
require_once __DIR__.'/footer.php';
        ?>
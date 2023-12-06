<?php
require_once __DIR__ . '/header.php';
?>
<style>
    .video-js {
        width: 100%;
    }

    .video-description {
        display: block;
        padding: 5px 0;
        font-size: 15px;
        line-height: 1.5;
        word-wrap: break-word;
        font-family: arial, sans-serif;
    }

    .video-description img {
        width: 100%;
    }

    .video-description figcaption {
        text-align: center;
    }
</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/video.js/5.10.2/alt/video-js-cdn.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/video.js/5.10.2/video.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-hls/3.0.2/videojs-contrib-hls.js"></script>
<!-- Content Wrapper. Contains page content -->

<!-- Modal -->


<input type="hidden" id="url" value="<?= $video[0] ?>">

<!-- Modal -->
<!-- <div class="modal fade" id="safariModal" style="z-index:10000000000">
    <div class="modal-dialog" style="position: fixed; bottom: 0; width: 100%; margin: 0;">
        <div class="modal-content bg-white text-dark">
            <div class="modal-header">
                <b class="modal-title">安裝「Pornlulu」app</b>
                <button type="button" class="btn btn-secondary btn-sm" onclick="hidePwa()">
                    <span aria-hidden="true">取消</span>
                </button>
            </div>
        </div>
    </div>
</div> -->




<!-- <div class="row no-gutters m-0">
                        <div class="col-12 col-lg-6 col-xl-4 text-center" style="padding-right:2px;padding-bottom:3px">
                            <a href="http://26se.cc" target="_blank"><img
                                    src="https://www.pornlulu.com/images/friend/0/594.webp?1699605531" alt=""
                                    style="max-width:100%"></a></div>
                        <div class="col-12 col-lg-6 col-xl-4 text-center" style="padding-right:2px;padding-bottom:3px">
                            <a href="https://88681368.app" target="_blank"><img
                                    src="https://www.pornlulu.com/images/friend/0/582.webp?1696492719" alt=""
                                    style="max-width:100%"></a></div>
                        <div class="col-12 col-lg-6 col-xl-4 text-center" style="padding-right:2px;padding-bottom:3px">
                            <a href="https://www.5454.xn--2scrj9c" target="_blank"><img
                                    src="https://www.pornlulu.com/images/friend/0/589.webp?1697982245" alt=""
                                    style="max-width:100%"></a></div>
                        <div class="col-12 col-lg-6 col-xl-4 text-center" style="padding-right:2px;padding-bottom:3px">
                            <a href="https://88oo77.com:13355/" target="_blank"><img
                                    src="https://www.pornlulu.com/images/friend/0/544.webp?1698219390" alt=""
                                    style="max-width:100%"></a></div>
                        <div class="col-12 col-lg-6 col-xl-4 text-center" style="padding-right:2px;padding-bottom:3px">
                            <a href="http://kyty8350.com/" target="_blank"><img
                                    src="https://www.pornlulu.com/images/friend/0/568.webp?1693484426" alt=""
                                    style="max-width:100%"></a></div>
                        <div class="col-12 col-lg-6 col-xl-4 text-center" style="padding-right:2px;padding-bottom:3px">
                            <a href="https://wdcwzhxtz2.2tzwdcwzhx.com/3434/tt79/index.html" target="_blank"><img
                                    src="https://www.pornlulu.com/images/friend/0/561.webp?1695459388" alt=""
                                    style="max-width:100%"></a></div>
                    </div> -->

<strong>
    <?= $video[1] ?>
</strong>
<div class="video-description">
    <?= $video[2] ?>
</div>


<div class="row pl-2 pr-2 mb-2" id="videos">
    <?php
    foreach ($phim as  $val) {
    ?>

        <div class="col-lg-3 col-md-3 col-sm-4 col-12  item p-0 pr-1">
            <div class="card">
                <div class="embed-responsive embed-responsive-16by9 position-relative">
                    <a class="visited" href="<?= $val['slug'] ?>"><img class="card-img-top" src="/<?= $val['image'] ?>" alt="母與子06-13直播實錄" data-src="<?= $val['image'] ?>" data-error="/imgdef/noimage.webp"></a>
                    <!-- <div class="imagelabel imagelabel-bottom-right"><span class="badge badge-success"><i
                                                class="fa fa-eye"></i> 314K</span></div> -->
                </div>
                <div class="card-body p-2">
                    <div class="two-lines"><a class="visited" href="<?= $val['slug'] ?>"><?= $val['name'] ?></a></div>
                </div>
            </div>
        </div>

    <?php
    }


    ?>
</div>
<nav aria-label="...">
    <ul class="pagination">
        <li class="page-item <?= ($page <= 1) ? "disabled" : "" ?> ">
            <a class="page-link" href="/list_blog?page=<?= $page - 1 ?>" tabindex="-1">Previous</a>
        </li>
        <?php for ($i = 1; $i <= ceil($phimCount / $limit); $i++) {
            if ($page == $i) {
        ?>

                <li class="page-item active">
                    <a class="page-link" href="/list_blog?page=<?= $i ?>"><?= $i ?> <span class="sr-only">(current)</span></a>
                </li>

            <?php
            } else if ($i == 1) {
            ?>
                <li class="page-item"><a class="page-link" href="/list_blog?page=<?= $i ?>"><?= $i ?></a></li>
            <?php
            } else if ($i == ceil($phimCount / $limit)) {
            ?>
                <li class="page-item"><a class="page-link" href="/list_blog?page=<?= $i ?>"><?= $i ?></a></li>
            <?php
            } else if ($page - 1 == $i) {
            ?>
                <li class="page-item"><a class="page-link" href="">...</a></li>

                <li class="page-item"><a class="page-link" href="/list_blog?page=<?= $i ?>"><?= $i ?></a></li>

            <?php
            } else if ($page + 1 == $i) {
            ?>

                <li class="page-item"><a class="page-link" href="/list_blog?page=<?= $i ?>"><?= $i ?></a></li>
                <li class="page-item"><a class="page-link" href="">...</a></li>

        <?php
            }
        } ?>
        <li class="page-item <?= ($page >= ceil($phimCount / $limit)) ? "disabled" : "" ?> ">
            <a class="page-link" href="/list_blog?page=<?= $page + 1 ?>">Next</a>
        </li>
    </ul>
</nav>
</div>
<!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>

<?php
require_once __DIR__ . '/footer.php';
echo   $schema;
?>
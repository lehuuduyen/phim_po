<?php
require_once __DIR__.'/header.php';
        ?>

                    <!-- Modal -->
                    <div class="modal fade" id="chromeModal" style="z-index:10000000000">
                        <div class="modal-dialog" style="position: fixed; bottom: 0; width: 100%; margin: 0;">
                            <div class="modal-content bg-white text-dark">
                                <div class="modal-header">
                                    <b class="modal-title">安裝「Pornlulu」app</b>
                                    <button type="button" class="btn btn-secondary btn-sm" onclick="hidePwa()">
                                        <span aria-hidden="true">取消</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div style="text-align:center"><img src="/logo.png" alt=""
                                            style="width:64px;height:64px;display:block;margin:10px auto;">Pornlulu
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" id="installButton">立即安裝</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        let deferredPrompt;
                        window.addEventListener('beforeinstallprompt', (e) => {
                            e.preventDefault();
                            deferredPrompt = e;
                            if (!isHiding() && 'ontouchstart' in window) {
                                $('#chromeModal').modal('show');
                            }
                        });

                        document.querySelector('#installButton').addEventListener('click', async () => {
                            $('#chromeModal').modal('hide');
                            deferredPrompt.prompt();
                            const {
                                outcome
                            } = await deferredPrompt.userChoice;
                            deferredPrompt = null;
                            if (outcome === 'accepted') {
                                console.log('User accepted the install prompt.');
                            } else if (outcome === 'dismissed') {
                                console.log('User dismissed the install prompt');
                            }
                        });
                    </script>

                    <!-- Modal -->
                    <div class="modal fade" id="safariModal" style="z-index:10000000000">
                        <div class="modal-dialog" style="position: fixed; bottom: 0; width: 100%; margin: 0;">
                            <div class="modal-content bg-white text-dark">
                                <div class="modal-header">
                                    <b class="modal-title">安裝「Pornlulu」app</b>
                                    <button type="button" class="btn btn-secondary btn-sm" onclick="hidePwa()">
                                        <span aria-hidden="true">取消</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div style="text-align:center"><img src="/logo.png" alt=""
                                            style="width:64px;height:64px;display:block;margin:10px auto;">Pornlulu
                                    </div>
                                    <hr>
                                    <h5>安裝步驟</h5>
                                    <ol>
                                        <li>
                                            <svg xmlns="http://www.w3.org/2000/svg" style="width:24px;height:24px;"
                                                viewBox="0 0 566 670">
                                                <path
                                                    d="M255 12c4-4 10-8 16-8s12 3 16 8l94 89c3 4 6 7 8 12 2 6 0 14-5 19-7 8-20 9-28 2l-7-7-57-60 2 54v276c0 12-10 22-22 22-12 1-24-10-23-22V110l1-43-60 65c-5 5-13 8-21 6a19 19 0 0 1-16-17c-1-7 2-13 7-18l95-91z">
                                                </path>
                                                <path
                                                    d="M43 207c16-17 40-23 63-23h83v46h-79c-12 0-25 3-33 13-8 9-10 21-10 33v260c0 13 0 27 6 38 5 12 18 18 30 19l14 1h302c14 0 28 0 40-8 11-7 16-21 16-34V276c0-11-2-24-9-33-8-10-22-13-34-13h-78v-46h75c13 0 25 1 37 4 16 4 31 13 41 27 11 17 14 37 14 57v280c0 20-3 41-15 58a71 71 0 0 1-45 27c-11 2-23 3-34 3H109c-19-1-40-4-56-15-14-9-23-23-27-38-4-12-5-25-5-38V270c1-22 6-47 22-63z">
                                                </path>
                                            </svg>
                                            點擊Safari底部的「分享」按鈕</li>
                                        <li>
                                            <svg xmlns="http://www.w3.org/2000/svg" style="width:24px;height:24px;"
                                                viewBox="0 0 578 584">
                                                <path
                                                    d="M101 35l19-1h333c12 0 23 0 35 3 17 3 34 12 44 27 13 16 16 38 16 58v329c0 19 0 39-8 57a65 65 0 0 1-37 37c-18 7-38 7-57 7H130c-21 1-44 0-63-10-14-7-25-20-30-34-6-15-8-30-8-45V121c1-21 5-44 19-61 13-16 33-23 53-25m7 46c-10 1-19 6-24 14-7 8-9 20-9 31v334c0 12 2 25 10 34 9 10 23 12 35 12h336c14 1 30-3 38-15 6-9 8-20 8-31V125c0-12-2-24-10-33-9-9-22-12-35-12H121l-13 1z">
                                                </path>
                                                <path
                                                    d="M271 161c9-11 31-10 38 4 3 5 3 11 3 17v87h88c7 0 16 1 21 7 6 6 7 14 6 22a21 21 0 0 1-10 14c-5 4-11 5-17 5h-88v82c0 7-1 15-6 20-10 10-29 10-37-2-3-6-4-13-4-19v-81h-87c-8-1-17-3-23-9-5-6-6-15-4-22a21 21 0 0 1 11-14c6-3 13-3 19-3h84v-88c0-7 1-14 6-20z">
                                                </path>
                                            </svg>
                                            點擊「加入主畫面」按鈕</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <script>
    var isSafari = /safari/i.test(navigator.userAgent);
    var isIos = /iphone|ipod|ipad/i.test(navigator.userAgent);
    if(isSafari && isIos  && !window.navigator.standalone){
        if(!isHiding()){
            window.addEventListener('load',function(){
                $('#safariModal').modal();
            });
        }
    }
    function isHiding(){
        var hideTime = localStorage.getItem('hide') || 0;
        return new Date().getTime() - hideTime < 86400*1000;
    }
    function hidePwa(){
        $('#safariModal').modal('hide');
        $('#chromeModal').modal('hide');
        localStorage.setItem('hide',new Date().getTime());
    }
    </script> -->

                    <!-- <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebSite",
      "url": "https://www.pornlulu.com/",
      "potentialAction": {
        "@type": "SearchAction",
        "target": "https://www.pornlulu.com/q/{search_term_string}",
        "query-input": "required name=search_term_string"
      }
    }
    </script>
     -->

                    <form id="keywordForm" action="/">
                        <!-- <div class="input-group mb-1">
                            <div class="input-group-prepend">
                                <a class="btn btn-primary" href="https://www.pornlulu.com/category"><i
                                        class="fa fa-th"></i> 分類</a> </div>
                            <input type="text" list="keywords" class="form-control" placeholder="Search (搜索)" value=""
                                name="q">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i
                                        class="fa fa-search"></i> </button>
                            </div>
                        </div> -->
                        <input type="hidden" name="category_id" value="263">
                        <script>
                            window.addEventListener('load', function () {
                                $("input[name='q']").change(function () {
                                    var q = $(this).val();
                                    $("#keywords option").each(function () {
                                        if ($(this).val() == q) {
                                            $(this).parents("form").submit();
                                        }
                                    });
                                });
                            });
                        </script>
                    </form>

                    <div class="row no-gutters m-0">
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
                    </div>

                    <div class="row pl-2 pr-2 mb-2" id="videos">
                        <?php
                        foreach($phim as  $val){
                            ?>

                        <div class="col-lg-3 col-md-3 col-sm-4 col-12  item p-0 pr-1">
                            <div class="card">
                                <div class="embed-responsive embed-responsive-16by9 position-relative">
                                    <a class="visited" href="<?=str_replace('https://www.pornlulu.com','',$val['url_movie_origin'])?>"><img class="card-img-top"
                                            src="<?=$val['image']?>"
                                            alt="母與子06-13直播實錄"
                                            data-src="<?=$val['image']?>"
                                            data-error="/imgdef/noimage.webp"></a>
                                    <div class="imagelabel imagelabel-bottom-right"><span class="badge badge-success"><i
                                                class="fa fa-eye"></i> 314K</span></div>
                                </div>
                                <div class="card-body p-2">
                                    <div class="two-lines"><a class="visited"
                                            href="<?=str_replace('https://www.pornlulu.com','',$val['url_movie_origin'])?>"><?=$val['name']?></a></div>
                                </div>
                            </div>
                        </div>

                        <?php
                        }
                        
                        
                        ?>
                    </div>

                    <nav id="w0">
                        <ul class="pagination">
                           
                                    <?php for($i=1;$i<= ceil($phimCount / $limit);$i++ ){?>
                            <li class="page-item <?=($page == $i)?'active':''?>"><a class="page-link"
                                    href="<?=$path?>?page=<?=$i?>" data-page="0"><?=$i?></a></li>
                            <?php }?>
                        </ul>
                    </nav>


                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>

        <?php
require_once __DIR__.'/footer.php';
        ?>
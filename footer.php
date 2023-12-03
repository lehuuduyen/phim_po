<footer class="main-footer">
            <div class="container-fluid p-2">
              
                <p>Contact &amp; Abuse: NONE of the media is hosted by this site. This
                    site only embed videos from other websites. If you have any question
                    to be addressed, please make sure to contact where the media is
                    actually hosted. Our service is a platform for users to search videos
                    from content providers, which according to US code:47 U.S.C. § 230, a
                    Provision of the Communication Decency Act, that "No provider or user
                    of an interactive computer service shall be treated as the publisher
                    or speaker of any information provided by another information content
                    provider."</p>
            </div>
        </footer>



        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark p-3 pt-5 pt-sm-3"
            style="display: none; top: 0px; bottom: 4px;">
            <ul id="w1" class="navbar-nav mr-auto links nav">
                <li class="nav-item"><a class="nav-link"
                        href="https://go.bbrdbr.com/?userId=5a1df9435cc16ffadd407e46bd997ea39c05cfea3c40428a9975b085cafee25f"
                        rel="nofollow" target="_blank">裸聊美女主播</a></li>
                <li class="nav-item"><a class="nav-link" href="https://www.hanime.xyz" rel="nofollow"
                        target="_blank">H動漫網</a></li>
            </ul>
        </aside>
        <!-- /.control-sidebar -->
        <div id="sidebar-overlay"></div>
    </div>
    <script src="/js/jquery.js"></script>
    <script src="/js/adminlte.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/main.js?6"></script>
    <script src="/js/bootstrap.bundle.js"></script>
    <script>
        jQuery(function ($) {
            $("#sidebar-overlay").click(function(){
                $('body').addClass('sidebar-collapse')
                $('body').addClass('sidebar-closed')
                $('body').removeClass('sidebar-open')
            })
            var didScroll;
            var lastScrollTop = 0;

            $(window).scroll(function (event) {
                didScroll = true;
            });

            setInterval(function () {
                if (!didScroll) {
                    return;
                }
                var st = $(this).scrollTop();
                var doms = $(".addthis-smartlayers-mobile,.auto-hide-show");
                if (st < 50) {
                    doms.slideDown();
                } else {
                    if (Math.abs(lastScrollTop - st) <= 50)
                        return;
                    if (st < lastScrollTop) {
                        doms.slideDown();
                    } else {
                        doms.slideUp();
                    }
                }

                lastScrollTop = st;
                didScroll = false;
            }, 250);

            var script = document.createElement('script');
            script.src = "https://www.googletagmanager.com/gtag/js?id=G-0GGDBPM7QH";
            document.head.appendChild(script);
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config', 'G-0GGDBPM7QH', {
                'page_path': location.pathname + location.search + location.hash
            });

            // if (location.protocol !== 'https:' && !/localhost/.test(location.host)) {
            //     location.protocol = 'https:';
            // }else{
            //     navigator.serviceWorker && navigator.serviceWorker.register('/sw.js');
            // }


            if (/web.pornbest.org/.test(location.href)) {
                document.querySelectorAll('#videos a').forEach(function (link) {
                    link.href = link.href.replace('web.pornbest.org', 'www.pornbest.org');
                });
            }

            var scrollFunc = function () {
                $(".lazyimage").each(function () {
                    r = this.getBoundingClientRect();
                    if ($(window).height() - r.top + 500 > 0) {
                        $(this).attr("src", $(this).data("src"));
                        $(this).removeClass("lazyimage");
                        $(this).on("error", function () {
                            var errorImage = $(this).data("error") ||
                                "/imgdef/noimage.webp";
                            $(this).attr("src", errorImage);
                        });
                    }
                });
            };

            scrollFunc();
            $(window).scroll(scrollFunc);
            $(document).keyup(scrollFunc);

            if (document.referrer.indexOf(location.host) == -1 && window.location.href != window.location
                .origin + '/') {
                window.history.pushState('', null, location.href);
                window.onpopstate = function () {
                    location = '/';
                };
                console.log('push state');
            }

        });
    </script>

    <div id="gtx-trans" style="position: absolute; left: 248px; top: 124px;">
        <div class="gtx-trans-icon"></div>
    </div>
</body>

</html>
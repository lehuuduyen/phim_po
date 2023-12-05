<html lang="zh-HANT" style="height: auto;">
<?php
$imgMeta = $http.'/style/img/logo.png';
if(isset($video[4])){
    $imgMeta = $video[4];
}

?>
<head>
    <meta name="robots" content="noindex">

    <meta name="theme-color" content="black">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="referrer" content="origin">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    
    <title><?=(!empty($title))?$title:"Pornlulu"?></title>
    <meta name="keywords" content="">
    <meta name="description" content="<?=(!empty($video))?$video[3]:"最大的線上無碼情色A片網站，日本AV視頻。本站有百萬高清免費的日本AV視頻全部免費觀看。本站特點就是沒廣告，播放流暢，全部高清。"?>">
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?=(!empty($title))?$title:"Pornlulu"?>" />
    <meta property="og:description" content="<?=(!empty($video))?$video[3]:"最大的線上無碼情色A片網站，日本AV視頻。本站有百萬高清免費的日本AV視頻全部免費觀看。本站特點就是沒廣告，播放流暢，全部高清。"?>" />
    <meta property="og:image" content="<?=$imgMeta?>" />
    <meta property="og:release_date" content="2023-11-15" />
    <link rel="canonical" href="<?=$fullHttp?>">

    <meta name="theme-color" content="#E1E1E1">
    <link href="/style/img/logo.png" rel="icon">
    <link href="/style/img/logo.png" rel="apple-touch-icon">
    <link href="/style/css/adminlte.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare2.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="/style/css/site.css?9.4" rel="stylesheet">
    <script src="https://www.googletagmanager.com/gtag/js?id=G-0GGDBPM7QH"></script>
    
</head>

<body data-root="/" class="sidebar-mini layout-fixed layout-navbar-fixed sidebar-closed sidebar-collapse"
    style="height: auto;position: absolute;" cz-shortcut-listen="true">
    <div class="wrapper">



   
        <div class="main-header auto-hide-show" style="">
            <div class="container-fluid " style="background:#000">

            </div>
            <nav class=" navbar navbar-expand navbar-dark" style="background: #a00">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" data-widget="pushmenu" href="#"><i
                                class="fa fa-bars"></i></a></li>
                </ul>
                <a class="navbar-brand py-0" href="/">
                    Pornlulu </a>

                <div class="d-none d-md-block" style="height: 40px; overflow: hidden">
                    <ul id="w1" class="navbar-nav mr-auto links nav">
                        <li class="nav-item"><a class="nav-link"
                                href="https://go.bbrdbr.com/?userId=5a1df9435cc16ffadd407e46bd997ea39c05cfea3c40428a9975b085cafee25f"
                                rel="nofollow" target="_blank">裸聊美女主播</a></li>
                        <li class="nav-item"><a class="nav-link" href="https://www.hanime.xyz" rel="nofollow"
                                target="_blank">H動漫網</a></li>
                    </ul>
                </div>

            </nav>
        </div>
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-primary elevation-4" style="z-index: 1000001;">
            <!-- Brand Logo -->

            <a href="/" class="brand-link"><img class="brand-image img-circle elevation-3"
                    src="/style/img/logo.png" alt=""> <span class="brand-text font-weight-light">Pornlulu</span> </a>

            <!-- Sidebar -->
            <div class="sidebar" style="overflow-y: auto;">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                 
                    <ul id="w4" class="nav nav-pills nav-sidebar flex-column nav-compact nav-flat links">
                        <?php
                          foreach($categories as $row) {
                                ?>
                        <li class="nav-item"><a class="nav-link"
                                href="<?=$http.$row['link']?>"><i
                                    class="nav-icon fa fa-circle"></i>
                                <p><?=$row['name']?></p>
                            </a>
                        </li>
                        <?php
                            }
                        
                        
                        ?>

                    </ul>
                </nav>
            </div>

        </aside>
        <div class="content-wrapper" style="margin-top: calc(6.5rem + 1px); overflow: hidden; min-height: 489px;">
            <!-- Main content -->
            <div class="content  py-1 py-md-2 px-0">
                <div class="container-fluid">
                    <nav aria-label="breadcrumb">
                        <ol id="w5" class="mb-2 breadcrumb">
                            <li class="breadcrumb-item"><a href="/">首頁</a></li>

                            <li class="breadcrumb-item"><a href="<?=$path?>"><?=(isset($titleCate))?$titleCate:""?></a></li>
                        </ol>
                    </nav>
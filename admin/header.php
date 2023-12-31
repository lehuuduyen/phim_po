<?php
$fullPath = $_SERVER['REQUEST_URI'];
if (isset($_POST['edit-category'])) {
    $name = $_POST['name'];
    $id = $_POST['id'];
    $sql = "UPDATE category SET name = '$name' WHERE id = $id";

    $categories = $conn->query($sql);
    $sql = "UPDATE movie SET textcategory = '$name' WHERE category_id = $id";

    $categories = $conn->query($sql);
    header('Location: /superadmin');
}
if (isset($_POST['edit-phim'])) {
    $name = $_POST['name'];
    $meta_description = $_POST['meta_description'];
    $content = $_POST['content'];
    $id = $_POST['id'];
    $sql = "UPDATE movie SET name = '$name' , meta_description = '$meta_description' , content = '$content' WHERE id = $id";

    $phimEdit = $conn->query($sql);
    header('Location: /superadmin/phim');
}
if (strpos($fullPath, "/superadmin/logout") !== false) {
    session_unset();
    header('Location: /superadmin');
}
if (strpos($fullPath, "/superadmin/category/delete") !== false) {
    $id =  $_GET['id'];
    $sql = "DELETE FROM category WHERE id =$id";
    $categories = $conn->query($sql);
    header('Location: /superadmin');
}
if (isset($_POST['create-blog'])) {
    $name = $_POST['name'];
    $meta_description = $_POST['meta_description'];
    $content = $_POST['content'];
    $status = $_POST['status'];
    $url_movie = $_POST['url_movie'];
    $image = "";
    $imagetemp = $_FILES['image']['tmp_name'];
    $newFile = 'style/img/' . time() . $_FILES['image']['name'];
    $result = move_uploaded_file($imagetemp, $newFile);
    if ($result) {
        $image = $newFile;
    }
    $time = '/blog/' . time();

    $sql = "INSERT INTO `blog` (`status`,`name`,`meta_description`,`content`,`image`,`slug`) VALUES ('$status','$name','$meta_description','$content','$image','$time')";
    $phimCreate = $conn->query($sql);
    
    header('Location: /superadmin/blog');
}
if (isset($_POST['edit-blog'])) {
    $name = $_POST['name'];
    $meta_description = $_POST['meta_description'];
    $content = $_POST['content'];
    $status = $_POST['status'];
    $url_movie = $_POST['url_movie'];
    $image = "";
    $id = $_POST['id'];
    $imagetemp = $_FILES['image']['tmp_name'];
    $newFile = 'style/img/' . time() . $_FILES['image']['name'];
    $result = move_uploaded_file($imagetemp, $newFile);
    if ($result) {
        $image = $newFile;
    }
    if(!empty($image)){
        $sql = "UPDATE blog SET status = '$status' , name = '$name' , meta_description = '$meta_description' , content = '$content' , image = '$image'  WHERE id = $id";

    }else{
    $sql = "UPDATE blog SET status = '$status' , name = '$name' , meta_description = '$meta_description' , content = '$content'   WHERE id = $id";

    }

    $phimCreate = $conn->query($sql);

    header('Location: /superadmin/blog');
}
if (strpos($fullPath, "/superadmin/blog/delete") !== false) {
    $id =  $_GET['id'];
    $sql = "DELETE FROM blog WHERE id =$id";
    $categories = $conn->query($sql);
    header('Location: /superadmin/blog');
}
?>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../style/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        .table-bordered th,
        .table-bordered td {
            word-break: break-word;
        }

        .table-bordered thead th,
        .table-bordered thead td {
            border-bottom-width: 2px;
            white-space: nowrap;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= ($fullPath == '/superadmin') ? 'active' : '' ?>">
                <a class="nav-link" href="/superadmin/">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Danh mục</span></a>
            </li>
            <li class="nav-item <?= ($fullPath == '/superadmin/phim') ? 'active' : '' ?>">
                <a class="nav-link" href="/superadmin/phim">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Phim</span></a>
            </li>
            <li class="nav-item <?= ($fullPath == '/superadmin/blog') ? 'active' : '' ?>">
                <a class="nav-link" href="/superadmin/blog">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Blog</span></a>
            </li>


        </ul>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


                    <!-- Topbar Search -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle" src="/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/superadmin/logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>


                    </ul>

                </nav>
<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Home Hunter</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta charset="UTF-8">
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <link rel="icon" href="assets/css/icons/home.png" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->
        <link rel="stylesheet" type="text/css" href="assets/css/cropper/cropper.min.css"/>
        <link rel="stylesheet" type="text/css" href="assets/css/jstree/jstree.min.css"/>
        <!--  EOF CSS INCLUDE -->

        <!-- CSS INCLUDE -->
        <link rel="stylesheet" type="text/css" id="theme" href="assets/css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->

        <?php
            error_reporting(0);
            session_start();
            $id = $_SESSION['id'];
            $username = $_SESSION['user_name'];
            $email = $_SESSION['email'];
            $role_id = $_SESSION['role_id'];

            $words = explode(" ", $username);
            // $words = explode(" ", $user->name);
            $acronym = "";

            foreach ($words as $w) {
              $acronym .= $w[0];
            }
        ?>

    </head>
    <body class="x-dashboard">
        <!-- START PAGE CONTAINER -->
        <div class="page-container">            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    
                    <div class="x-hnavigation">
                        <div class="x-hnavigation-logo">
                            <a href="index.php" style="background: url('assets/images/home-hunter.png') left center no-repeat !important;">Atlant</a>
                        </div>
                        <ul>
                            <li <?php if($_SERVER['REQUEST_URI']=="/home/index.php") echo 'class="active"'; ?>>
                                <a href="index.php">Home</a>
                            </li>
                            <li <?php if($_SERVER['REQUEST_URI']=="/home/index.php?page=views/homes/_filter_index&get_id=jual") echo 'class="active"'; ?>>
                                <a href="index.php?page=views/homes/_filter_index&get_id=jual">Jual</a>
                            </li>
                            <li <?php if($_SERVER['REQUEST_URI']=="/home/index.php?page=views/homes/_filter_index&get_id=sewa") echo 'class="active"'; ?>>
                                <a href="index.php?page=views/homes/_filter_index&get_id=sewa">Sewa</a>
                            </li>
                            <li <?php if($_SERVER['REQUEST_URI']=="/home/index.php?page=views/buildings/create") echo 'class="active"'; ?>>
                                <?php 
                                    if ($id == null) {
                                ?>
                                    <a href="#" data-toggle="modal" data-target="#modal_basic">Pasang Iklan ? </a>
                                <?php } else { ?>
                                    <a href="index.php?page=views/buildings/create" >Pasang Iklan ? </a>
                                <?php } ?>
                            </li>
                        </ul>
                        
                        <div class="x-features">
                            <div class="x-features-nav-open">
                                <span class="fa fa-bars"></span>
                            </div>
                            <div class="pull-right">
                                    <div class="x-features-search">
                                        <form action="index.php?page=views/homes/_search_index" name="Search" method="POST">
                                                <input type="text" name="search">
                                                <input type="submit" id="Submit" onclick="window.location.href='index.php?page=views/homes/_search_index'">
                                        </form>
                                    </div>
                                <?php
                                    if ($username == null) {
                                    
                                    ?>
                                    <div class="x-features-profile">
                                        <img src="assets/images/users/no-image.jpg">
                                        <ul class="animated zoomIn">
                                            <li><a href="views/auth/login.php"><span class="fa fa-sign-in"></span> Login / Register</a></li>
                                        </ul>
                                    </div>
                                <?php } else { ?>
                                    <div class="x-features-profile">
                                        <div style='color: #DDD; font-size: 30px; text-align: center; margin-top: -18px; '><?php echo strtoupper($acronym) ?></div>
                                        <ul class="animated zoomIn">
                                            <?php
                                                if ($role_id == 1) {
                                                    echo '<li><a href="index.php?page=views/admin/index&get_id='.$id.'"><span class="fa fa-gear"></span> Panel Admin</a></li>';
                                                }
                                            ?>
                                            <li><a href="" style="pointer-events: none; cursor: default; text-decoration: none;"><span class="fa fa-envelope"></span> <?php echo $email ?></a></li>
                                            <li><a href="index.php?page=views/users/edit&get_id=<?php echo $id ?>"><span class="fa fa-user"></span> Edit Profile</a></li>
                                            <li><a href="index.php?page=views/buildings/index&get_id=<?php echo $id ?>"><span class="fa fa-building"></span> List Home</a></li>
                                            <li><a href="controller/proses_logout.php"><span class="fa fa-sign-out"></span> Sign Out</a></li>
                                        </ul>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>                        
                    </div>


<!-- MODALS -->        
<div class="modal" id="modal_basic" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="defModalHead">Login | Register</h4>
            </div>
            <div class="modal-body">
                Login | Register untuk dapat membuat iklan
            </div>
            <div class="modal-footer">
                <a href="views/auth/login.php">
                    <button type="button" class="btn btn-default">
                        Login
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- END MODALS -->    
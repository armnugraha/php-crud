<?php 
    include 'connection/connection.php';
    $id_user = $_SESSION['id'];
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $role_id = $_SESSION['role_id'];

    if($id_user == null || $role_id != 1){
        echo '<script>window.history.back()</script>';   
    }

    $query="SELECT * from users";
	$hasil=mysql_query($query);

	$cek=mysql_num_rows($hasil);

	$query_bd="SELECT * from buildings";
	$hasil_bd=mysql_query($query_bd);

	$cek_bd=mysql_num_rows($hasil_bd);

	$sql = mysql_query("SELECT COUNT(city) FROM buildings");
	$city=mysql_num_rows($sql);

    $sql = "SELECT * FROM users where id=$id_user";
    $get_user =mysql_query($sql) or die("select data menu error :".mysql_error());
    $user =mysql_fetch_assoc($get_user);
    
?>
<!-- START PAGE CONTAINER -->
<div class="page-container">
<!-- START PAGE SIDEBAR -->
<div class="page-sidebar" style="max-width: 170px;">
    <!-- START X-NAVIGATION -->
    <ul class="x-navigation" style="max-height: none; max-width: 170px;">
        <li class="xn-profile">
            <div class="profile">
                <div class="profile-image">
                	<?php 
                        if ($user['img'] == null) {
                    ?>
                        <img src="assets/images/users/no-image.jpg"/>
                    
                    <?php } else {?>
                        <img src="assets/user_files/<?php echo $user['id']; ?>/<?php echo $user['img']; ?>"/>
                    <?php } ?>
                </div>
                <div class="profile-data">
                    <div class="profile-data-name"><?php echo $name; ?></div>
                    <div class="profile-data-title"><?php echo $email; ?></div>
                </div>
            </div>
        </li>
        <li>
            <a href="index.php?page=views/admin/index&get_id=<?php echo $id_user; ?>"><span class="fa fa-dashboard"></span> <span class="xn-text">Dashboards</span></a>
        </li>   
        <li>
            <a href="index.php?page=views/admin/_index_building&get_id=<?php echo $id_user; ?>"><span class="fa fa-image"></span> List Rumah</a>
        </li>
        <li>
            <a href="index.php?page=views/admin/_index_user&get_id=<?php echo $id_user; ?>"><span class="fa fa-user"></span> List User</a>
        </li>
        <li>
            <a href="index.php?page=views/admin/_index_role&get_id=<?php echo $id_user; ?>"><span class="fa fa-asterisk"></span> Roles</a>
        </li>
    </ul>
    <!-- END X-NAVIGATION -->
</div>
<!-- END PAGE SIDEBAR -->
    <!-- PAGE CONTENT -->
    <div class="page-content">
                
        <div class="row">
            
            <div class="col-md-3">
                <div class="widget widget-primary widget-item-icon">
                    <div class="widget-item-left">
                        <span class="fa fa-user"></span>
                    </div>
                    <div class="widget-data">
                        <div class="widget-int num-count"><?php echo $cek; ?></div>
                        <div class="widget-title">Registred users</div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="widget widget-primary widget-item-icon">
                    <div class="widget-item-left">
                        <span class="fa fa-building"></span>
                    </div>
                    <div class="widget-data">
                        <div class="widget-int num-count"><?php echo $cek_bd; ?></div>
                        <div class="widget-title">Building Registred</div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="widget widget-primary widget-item-icon">
                    <div class="widget-item-left">
                        <span class="fa fa-map-marker"></span>
                    </div>
                    <div class="widget-data">
                        <div class="widget-int num-count"><?php echo $city; ?></div>
                        <div class="widget-title">City in Building</div>
                    </div>
                </div>
            </div>

        </div>

</div>
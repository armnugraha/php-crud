<?php 
    include 'connection/connection.php';
    $id_user = $_SESSION['id'];
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $role_id = $_SESSION['role_id'];

    if($id_user == null || $role_id != 1){
        echo '<script>window.history.back()</script>';   
    }

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
            <a href="#" class="profile-mini">
                <img src="assets/images/users/avatar.jpg" alt="John Doe"/>
            </a>
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
                    <div class="profile-data-name"><?php echo htmlspecialchars($name); ?></div>
                    <div class="profile-data-title"><?php echo htmlspecialchars($email); ?></div>
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
            <div class="col-md-10">

                <!-- START BASIC TABLE SAMPLE -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">List Rumah</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Title</th>
                                        <th>Address</th>
                                        <th>Price</th>
                                        <th>Tahun Dibangun</th>
                                        <th>Expire Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if (isset($_GET['pages'])) {
                                            $page = $_GET['pages'];
                                        } else {
                                            $page = 1;
                                        }

                                        $no_of_records_per_page = 8;
                                        $offset = ($page-1) * $no_of_records_per_page;

                                        $total_pages_sql = "SELECT COUNT(*) FROM buildings";
                                        $result = mysql_query($total_pages_sql);
                                        $total_rows = mysql_fetch_array($result)[0];
                                        $total_pages = ceil($total_rows / $no_of_records_per_page);

                                        $sql ="SELECT * FROM buildings ORDER BY id DESC LIMIT $offset, $no_of_records_per_page";
                                        //untuk menyeleksi data error
                                        $query =mysql_query($sql) or die("select data menu error :".mysql_error());
                                        $cek=mysql_num_rows($query);
                                        if ($cek == null) {
                                        ?>
                                        <tr>
                                            <td style="background-color: #FFF !important;">Data Kosong</td>
                                        </tr>
                                        <?php }else{
                                        while($record =mysql_fetch_array($query)){
                                    ?>
                                    <tr>
                                        <td style="background-color: #FFF !important; border-bottom: 2px solid #F5f5f5;"><?php echo $record['id'];?></td>
                                        <td style="background-color: #FFF !important; border-bottom: 2px solid #F5f5f5;"><?php echo htmlspecialchars($record['title']);?></td>
                                        <td style="background-color: #FFF !important; border-bottom: 2px solid #F5f5f5;"><?php echo htmlspecialchars($record['city'] .', '. $record['province']);?></td>
                                        <td style="background-color: #FFF !important; border-bottom: 2px solid #F5f5f5;"><strong>Rp.</strong> <?php echo $record['price'];?></td>
                                        <td style="background-color: #FFF !important; border-bottom: 2px solid #F5f5f5;"><?php echo $record['tahun_dibangun'];?></td>
                                        <td style="background-color: #FFF !important; border-bottom: 2px solid #F5f5f5;">
                                            <?php echo $record['expiredate'];?>
                                        </td>
                                        <td style="background-color: #FFF !important; border-bottom: 2px solid #F5f5f5;">
                                            <?php 
                                                if ($record['expiredate'] >= date("Y-m-d H:m:s")) {
                                                    echo '<button class="btn btn-success btn-rounded btn-condensed btn-sm" data-toggle="tooltip" data-placement="right" title="" data-original-title="Active">Active</button>';
                                                }else{
                                                    echo '<button class="btn btn-warning btn-rounded btn-condensed btn-sm" data-toggle="tooltip" data-placement="right" title="" data-original-title="Not Active">Expired</button>';
                                                }
                                            ?>
                                        </td>
                                        <td style="background-color: #FFF !important; border-bottom: 2px solid #F5f5f5;">
                                            <a href="index.php?page=views/buildings/edit&get_id=<?php echo $record['id']; ?>"><button class="btn btn-default btn-rounded btn-condensed btn-sm" data-toggle="tooltip" data-placement="right" title="" data-original-title="Edit Rumah"><span class="fa fa-pencil"></span></button></a>
                                            <a href="controller/buildingsController.php?get_id=<?php echo $record['id']; ?>"><button class="btn btn-danger btn-rounded btn-condensed btn-sm" data-toggle="tooltip" data-placement="right" title="" data-original-title="Delete Rumah" onClick="delete_row('trow_1');"><span class="fa fa-times"></span></button></a>
                                        </td>
                                    </tr>
                                    <?php } } ?>
                                </tbody>
                            </table>
                        </div>
                        <?php
                            if ($cek != null && $total_rows >= $no_of_records_per_page) {
                            ?>
                            <ul class="pagination pagination-sm pull-right push-down-20">
                                <?php if($page <= 1){ 

                                    } else{
                                        echo '<li class=""><a href="index.php?page=views/admin/_index_building&get_id='.$id_user.'&pages=1">First</a></li>';
                                    }
                                ?>
                                <li class="<?php if($page <= 1){ echo 'disabled'; } ?>">
                                    <a href="<?php if($page <= 1){ echo '#'; } else { echo "index.php?page=views/admin/_index_building&get_id=".($id_user)."&pages=".($page - 1); } ?>">Prev</a>
                                </li>
                                <li class="<?php if($page >= $total_pages){ echo 'disabled'; } ?>">
                                    <a href="<?php if($page >= $total_pages){ echo '#'; } else { echo "index.php?page=views/admin/_index_building&get_id=".($id_user)."&pages=".($page + 1); } ?>">Next</a>
                                </li>
                                <li><a href="index.php?page=views/admin/_index_building&get_id=<?php echo $id_user; ?>&pages=<?php echo $total_pages; ?>">Last</a></li>
                            </ul>
                        <?php } ?>
                    </div>
                </div>
                <!-- END BASIC TABLE SAMPLE -->
            </div>
        </div>

</div>
<!-- PAGE TITLE -->
<div class="page-title">                    
    <h2><span class="fa fa-arrow-circle-o-left"></span> Posts</h2>
</div>
<!-- END PAGE TITLE -->                

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    
    <div class="row">
        <div class="col-md-9">
            
            <div class="panel panel-default">
                <div class="panel-body posts">
                    
                    <div class="row">
                        <?php
                            include 'connection/connection.php';

                                if (isset($_GET['pages'])) {
                                    $page = $_GET['pages'];
                                } else {
                                    $page = 1;
                                }

                                // var_dump($_GET['get_id']);
                                // die();

                                $city = $_GET['get_id'];

                                $no_of_records_per_page = 10;
                                $offset = ($page-1) * $no_of_records_per_page;

                                $total_pages_sql = "SELECT COUNT(*) FROM buildings where city='$city' and expiredate>= now() ";
                                $result = mysql_query($total_pages_sql);
                                $total_rows = mysql_fetch_array($result)[0];
                                $total_pages = ceil($total_rows / $no_of_records_per_page);

                                $sql ="SELECT * FROM buildings where city='$city'and expiredate>= now() ORDER BY id DESC LIMIT $offset, $no_of_records_per_page";

                            //untuk menyeleksi data error
                            $query =mysql_query($sql) or die("select data menu error :".mysql_error());
                            $cek=mysql_num_rows($query);
                            
                                // var_dump($cek);
                                // die();

                            if ($cek == null) {
                                echo "Data Tidak ditemukan untuk daerah ".$city;
                            }else{
                            while($record =mysql_fetch_array($query)){
                        ?>
                        <div class="col-md-6">
                            
                            <div class="post-item">
                                <div class="post-title">
                                    <?php echo htmlspecialchars($record['title']) ?>
                                </div>
                                <div class="post-date"><span class="fa fa-calendar"></span> <?php echo $record['created_at'] ?> / 
                                    <?php
                                        include 'connection/connection.php';
                                        $id = $record['user_id'];
                                        $sql = "SELECT name FROM users where id=$id";
                                        $get_user =mysql_query($sql) or die("select data menu error :");
                                        $user =mysql_fetch_assoc($get_user);

                                        if ($user != null) {
                                            foreach ($user as $item) {
                                                echo htmlspecialchars("by $item");
                                            }
                                        }else{
                                            echo "by Anonymous";
                                        }
                                    ?>
                                </div>
                                <div class="post-text">
                                    <img src="assets/building_files/<?php echo $record['id']?>/<?php echo $record['img']?>" class="img-responsive img-text" style="height: 150px;"/>
                                    <p>
                                        <?php echo htmlspecialchars($record['description']) ?>
                                    </p>
                                    <p>Luas Bangunan : <?php echo $record['luas_bangunan'] . 'm<sup>2</sup>' ?></p>
                                    <p>Luas Tanah : <?php echo $record['luas_tanah'] . 'm<sup>2</sup>' ?></p>
                                    <p></p>
                                </div>
                                <div class="post-row">
                                    <div class="post-info">
                                        <span class="fa fa-money"></span> Rp. <?php echo $record['price'];?>
                                    </div>
                                    <a href="index.php?page=views/homes/show&get_id=<?php echo $record['id']; ?>">
                                        <button class="btn btn-default btn-rounded pull-right">Read more &RightArrow;</button>
                                    </a>
                                </div>
                            </div>                                            
                        </div>
                           <?php } } ?>
                    </div>

                    
                </div>
            </div>
            <?php
                if ($cek != null && $total_rows >= $no_of_records_per_page) {
                ?>
                    <ul class="pagination pagination-sm pull-right push-down-20">
                        <?php if($page <= 1){ 

                            } else{
                                echo '<li class=""><a href="index.php?page=views/homes/_filter_city_index&get_id='.$city.'&pages=1">First</a></li>';
                            }
                        ?>
                        <li class="<?php if($page <= 1){ echo 'disabled'; } ?>">
                            <a href="<?php if($page <= 1){ echo '#'; } else { echo "index.php?page=views/homes/_filter_city_index&get_id=".($city)."&pages=".($page - 1); } ?>">Prev</a>
                        </li>
                        <li class="<?php if($page >= $total_pages){ echo 'disabled'; } ?>">
                            <a href="<?php if($page >= $total_pages){ echo '#'; } else { echo "index.php?page=views/homes/_filter_city_index&get_id=".($city)."&pages=".($page + 1); } ?>">Next</a>
                        </li>
                        <li><a href="index.php?page=views/homes/_filter_city_index&get_id=<?php echo $city; ?>&pages=<?php echo $total_pages; ?>">Last</a></li>
                    </ul>

            <?php } ?>
            
        </div>   
        <div class="col-md-3">
            
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>Recent</h3>
                    <div class="links small">
                        <?php
                            include 'connection/connection.php';

                            $sql ="SELECT * FROM buildings where expiredate>= now() ORDER BY updated_at DESC LIMIT 10";
                            //untuk menyeleksi data error
                            $query =mysql_query($sql) or die("select data menu error :");
                            while($record =mysql_fetch_array($query)){
                        ?>
                            <a href='index.php?page=views/homes/show&get_id=<?php echo $record['id']; ?>'><?php echo htmlspecialchars($record['title']) ?></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
            
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>Filter By City</h3>
                    <ul class="list-tags push-up-10">
                        <li><a href="index.php?page=views/homes/_filter_city_index&get_id=Bandung"><span class="fa fa-map-marker"></span> Bandung</a></li>
                        <li><a href="index.php?page=views/homes/_filter_city_index&get_id=Jakarta"><span class="fa fa-map-marker"></span> Jakarta</a></li>
                        <li><a href="index.php?page=views/homes/_filter_city_index&get_id=Garut"><span class="fa fa-map-marker"></span> Garut</a></li>
                        <li><a href="index.php?page=views/homes/_filter_city_index&get_id=Yogyakarta"><span class="fa fa-map-marker"></span> Yogyakarta</a></li>
                    </ul>
                </div>
            </div>
            
        </div>
    </div>

</div>
<!-- END PAGE CONTENT WRAPPER -->
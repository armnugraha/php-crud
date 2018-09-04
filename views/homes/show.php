<?php

    // error_reporting(0);
    include('connection/connection.php');
    
    $id = $_GET['get_id'];
    
    $show = mysql_query("SELECT * FROM buildings WHERE id='$id'");
    $show_image = mysql_query("SELECT * FROM building_files WHERE building_id='$id'");
        //cek apakah data dari hasil query ada atau tidak
    if(mysql_num_rows($show) == 0){
            //jika tidak ada data yg sesuai maka akan langsung di arahkan ke halaman depan atau beranda -> index.php
        echo '<script>window.history.back()</script>';
        
    }else{
            //jika data ditemukan, maka membuat variabel $data
        $data = mysql_fetch_assoc($show);   //mengambil data ke database yang nantinya akan ditampilkan di form edit di bawah
        // $data_image = mysql_fetch_assoc($show_image);    //mengambil data ke database yang nantinya akan ditampilkan di form edit di bawah
    }
?>

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li><?php echo htmlspecialchars($data['title']); ?></li>
                </ul>
                <!-- END BREADCRUMB -->
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    
                    <div class="row">

                        <div class="col-md-9">
                            <div class="panel panel-default">
                                <div class="panel-body profile bg-info">

                                    <div class="profile-image">
                                        <img src="assets/building_files/<?php echo $data['id'] ?>/<?php echo $data['img'] ?>" style="width: 320px;">
                                    </div>

                                    <div class="profile-controls">
                                        <a href="#" class="profile-control-left" style="width: 80px; height: 40px; font-size: 23px; border: 2px solid #cfcbcb; line-height: 34px;">
                                            <?php echo $data['type'] ?>
                                        </a>
                                    </div>

                                    <div class="profile-image">
                                        <a class="gallery-item" href="assets/building_files/<?php echo $data['id'] ?>/<?php echo $data['img'] ?>" title="Image" data-gallery>
                                            <div class="image">                              
                                                <img src="assets/building_files/<?php echo $data['id'] ?>/<?php echo $data['img'] ?>" style="border-radius: 0%; height: 80px; float: left;">
                                            </div>
                                        </a>
                                        <?php
                                            while($data_image = mysql_fetch_assoc($show_image)){
                                            echo '<a class="gallery-item" href="assets/building_files/'.$data['id'].'/'.$data_image['name'].'" title="Image" data-gallery>
                                                    <div class="image">                              
                                                        <img src="assets/building_files/'.$data['id'].'/'.$data_image['name'].'" style="border-radius: 0%; float: left; height: 80px;">
                                                    </div>
                                                </a>';
                                            }
                                          ?>
                                    </div>

                                </div>
                                <div class="panel-body list-group">
                                    <a href="#" class="list-group-item" style="pointer-events: none; cursor: default;"><h2><span class="fa fa-money"></span> Rp. <?php echo $data['price'] ?></h2></a>
                                    <a href="#" class="list-group-item" style="pointer-events: none; cursor: default;"><h2><span class="fa fa-map-marker"></span> <?php echo htmlspecialchars($data['city']).', '. $data['province'] ?></h2>

                                        <span class="help-block"><?php echo htmlspecialchars($data['address']) ?></span>
                                    </a>
                                    <a href="#" class="list-group-item" style="pointer-events: none; cursor: default;"><h4><img src="assets/css/icons/bed-solid.svg" style="width: 20px;"> <?php echo $data['jml_kmr_tdr'] ?> Kamar</h4></a>
                                    <a href="#" class="list-group-item" style="pointer-events: none; cursor: default;"><h4><span class="fa fa-building"></span> <?php echo $data['jml_lantai'] ?> Tingkat</h4></a>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-body posts">
                                            
                                    <div class="post-item">
                                        <div class="post-date">
                                            <span class="fa fa-calendar"></span> <?php echo $data['created_at']; ?> / 
                                                <a href="pages-profile.html">
                                                    <?php
                                                        include 'connection/connection.php';
                                                        $id = $data['user_id'];
                                                        $sql = "SELECT * FROM users where id=$id";
                                                        $get_user =mysql_query($sql) or die("select data menu error :");
                                                        $user =mysql_fetch_assoc($get_user);
                                                            if ($user != null ) {
                                                                echo htmlspecialchars("by " . $user['name']);
                                                            }else{
                                                                echo "by Anonymous";
                                                            }
                                                    ?>
                                                </a>
                                        </div>
                                        <div class="post-title">
                                            <strong><?php echo htmlspecialchars($data['title']); ?></strong>
                                        </div>
                                        <div class="post-text">                                            
                                            <?php echo htmlspecialchars($data['description']); ?>
                                        </div>
                                        <div class="post-row">
                                            <div class="post-info">
                                                
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-12">
                                <!-- START VERTICAL TABS WITH HEADING -->
                                <div class="panel panel-default nav-tabs-vertical">                   
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Informasi Properti</h3>
                                    </div>
                                    <div class="tabs">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#tab19" data-toggle="tab">Detil Properti</a></li>
                                            <li><a href="#tab20" data-toggle="tab">Fasilitas</a></li>
                                        </ul>                    
                                        <div class="panel-body tab-content">
                                            <div class="tab-pane active" id="tab19">
                                                <div class="col-md-6">

                                                    <div class="invoice-address">
                                                        <table class="table table-striped">
                                                            <tbody >
                                                                <tr>
                                                                    <td width="200" style="background: #FFF !important; border-bottom: 2px solid #F5f5f5;">Luas Bangunan :</td>
                                                                    <td class="text-right" style="background: #FFF !important; border-bottom: 2px solid #F5f5f5;"><?php echo $data['luas_bangunan']; ?>m<sup>2</sup></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="background: #FFF !important; border-bottom: 2px solid #F5f5f5;">Luas Tanah :</td>
                                                                    <td class="text-right" style="background: #FFF !important; border-bottom: 2px solid #F5f5f5;"><?php echo $data['luas_tanah']; ?>m<sup>2</sup></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="200" style="background: #FFF !important; border-bottom: 2px solid #F5f5f5;">Tahun Dibangun :</td>
                                                                    <td class="text-right" style="background: #FFF !important; border-bottom: 2px solid #F5f5f5;"><?php echo $data['tahun_dibangun']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="200" style="background: #FFF !important; border-bottom: 2px solid #F5f5f5;">Sertifikat :</td>
                                                                    <td class="text-right" style="background: #FFF !important; border-bottom: 2px solid #F5f5f5;"><?php echo htmlspecialchars($data['sertifikat']); ?></td>
                                                                </tr>
                                                                <tr>
                                                                <tr>
                                                                    <td style="background: #FFF !important; border-bottom: 2px solid #F5f5f5;">Sumber Air :</td>
                                                                    <td class="text-right" style="background: #FFF !important; border-bottom: 2px solid #F5f5f5;"><?php echo htmlspecialchars($data['sumber_air']); ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                    </div>

                                                </div>
                                                <div class="col-md-6">

                                                    <div class="invoice-address">
                                                        <table class="table table-striped">
                                                            <tbody >
                                                                <tr>
                                                                    <td style="background: #FFF !important; border-bottom: 2px solid #F5f5f5;">Jumlah Watt :</td>
                                                                    <td class="text-right" style="background: #FFF !important; border-bottom: 2px solid #F5f5f5;"><?php echo $data['jml_watt']; ?></td>
                                                                </tr>
                                                                    <td style="background: #FFF !important; border-bottom: 2px solid #F5f5f5;">Jumlah Garasi :</td>
                                                                    <td class="text-right" style="background: #FFF !important; border-bottom: 2px solid #F5f5f5;"><?php echo $data['jml_garasi']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="200" style="background: #FFF !important; border-bottom: 2px solid #F5f5f5;">Jumlah Kamar Mandi :</td>
                                                                    <td class="text-right" style="background: #FFF !important; border-bottom: 2px solid #F5f5f5;"><?php echo $data['jml_kmr_mandi']; ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tab20" style="padding-top: 30px;">
                                                <p><?php echo htmlspecialchars($data['fasilitas']); ?></p>

                                            </div>
                                        </div>
                                    </div>
                                </div>                        
                                <!-- END VERTICAL TABS WITH HEADING -->
                            </div>
                            
                        </div>
                        <div class="col-md-3">

                            <div class="panel panel-default form-horizontal">
                                <div class="panel-body">
                                    <h3><span class="fa fa-info-circle"></span> Quick Info</h3>
                                    <p>Some quick info about this user</p>
                                </div>
                                <div class="panel-body">
                                    <div class="text-center" id="user_image">
                                        <?php 
                                            if ($user['img'] == null) {
                                        ?>
                                            <img src="assets/images/users/no-image.jpg" class="img-thumbnail"/>
                                        
                                        <?php } else {?>
                                            <img src="assets/user_files/<?php echo $user['id']; ?>/<?php echo $user['img']; ?>" class="img-thumbnail"/>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="panel-body form-group-separated">
                                    <div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">Name</label>
                                        <div class="col-md-8 col-xs-7 line-height-30"><?php echo htmlspecialchars($user['name']); ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">Address</label>
                                        <div class="col-md-8 col-xs-7 line-height-30"><?php echo htmlspecialchars($user['city'] .', '. $user['province']); ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">Contact</label>
                                        <div class="col-md-8 col-xs-7 line-height-30"><?php echo $user['contact']; ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">Email</label>
                                        <div class="col-md-8 col-xs-7 line-height-30"><?php echo htmlspecialchars($user['email']); ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">Anggota Sejak</label>
                                        <div class="col-md-8 col-xs-7 line-height-30">
                                            <?php 
                                                $str = $user['created_at'];
                                                if (($timestamp = strtotime($str)) !== false)
                                                {
                                                  $php_date = getdate($timestamp);
                                                  $date = date("d - M - Y", $timestamp);
                                                  echo $date;
                                                }
                                                else
                                                {
                                                  echo 'invalid timestamp!';
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3>Recent</h3>
                                    <div class="links small">
                                        <?php
                                            include 'connection/connection.php';

                                            $sql ="SELECT * FROM buildings where expiredate>= now() ORDER BY updated_at DESC LIMIT 10";
                                            //untuk menyeleksi data error
                                            $query =mysql_query($sql) or die("select data menu error :".mysql_error());
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
                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

    <!-- BLUEIMP GALLERY -->
    <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
        <div class="slides"></div>
        <h3 class="title"></h3>
        <a class="prev">‹</a>
        <a class="next">›</a>
        <a class="close">×</a>
        <a class="play-pause"></a>
        <ol class="indicator"></ol>
    </div>      
    <!-- END BLUEIMP GALLERY -->
    
    </body>
</html>
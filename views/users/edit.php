<?php

    // error_reporting(0);
    include('connection/connection.php');

    $id_user = $_SESSION['id'];
    $role_id = $_SESSION['role_id'];
    
    $id = $_GET['get_id'];
    
    $show = mysql_query("SELECT * FROM users WHERE id='$id'");
        //cek apakah data dari hasil query ada atau tidak
    if(mysql_num_rows($show) == 0 || $id_user == null || $role_id != 1 && $id_user != $id){
            //jika tidak ada data yg sesuai maka akan langsung di arahkan ke halaman depan atau beranda -> index.php
        echo '<script>window.history.back()</script>';
        
    }else{
            //jika data ditemukan, maka membuat variabel $data
        $data = mysql_fetch_assoc($show);   //mengambil data ke database yang nantinya akan ditampilkan di form edit di bawah
        // $data_image = mysql_fetch_assoc($show_image);    //mengambil data ke database yang nantinya akan ditampilkan di form edit di bawah
    }
?>

<!-- PAGE TITLE -->
<div class="page-title">                    
    <h2><span class="fa fa-cogs"></span> Edit Profile</h2>
</div>
<!-- END PAGE TITLE -->                     

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    
    <div class="row">
        <div class="col-md-3 col-sm-4 col-xs-5">
            
            <form action="#" class="form-horizontal">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3><span class="fa fa-user"></span> <?php echo htmlspecialchars($data['name']); ?></h3>
                    <p><?php echo htmlspecialchars($data['email']); ?></p>
                    <div class="text-center" id="user_image">
                        <?php 
                            if ($data['img'] == null) {
                        ?>
                            <img src="assets/images/users/no-image.jpg" class="img-thumbnail"/>
                        
                        <?php } else {?>
                            <img src="assets/user_files/<?php echo $data['id']; ?>/<?php echo $data['img']; ?>" class="img-thumbnail"/>
                        <?php } ?>
                    </div>                                    
                </div>
                <div class="panel-body form-group-separated">
                    
                    <div class="form-group">                                        
                        <div class="col-md-12 col-xs-12">
                            <a href="#" class="btn btn-primary btn-block btn-rounded" data-toggle="modal" data-target="#modal_change_photo">Change Photo</a>
                        </div>
                    </div>
                    
                    <div class="form-group">                                        
                        <div class="col-md-12 col-xs-12">
                            <a href="#" class="btn btn-danger btn-block btn-rounded" data-toggle="modal" data-target="#modal_change_password">Change password</a>
                        </div>
                    </div>
                    
                </div>
            </div>
            </form>
            
        </div>
        <div class="col-md-6 col-sm-8 col-xs-7">
            
            <form action="controller/edit_user.php" id="validate" method="post" role="form" class="form-horizontal" action="javascript:alert('Form #validate submited');">

            <input type="hidden" name="get_id" value="<?php echo $data['id']; ?>">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3><span class="fa fa-pencil"></span> Profile</h3>
                    
                </div>
                <div class="panel-body form-group-separated">
                    <div class="form-group">
                        <label class="col-md-3 col-xs-5 control-label">Name</label>
                        <div class="col-md-9 col-xs-7">
                            <input type="text" value="<?php echo $data['name']; ?>" class="validate[required] form-control" id="fullName" name="fullName"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-5 control-label">User Name</label>
                        <div class="col-md-9 col-xs-7">
                            <input type="text" value="<?php echo $data['user_name']; ?>" class="validate[required] form-control" id="username" name="username"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-5 control-label">Email</label>
                        <div class="col-md-9 col-xs-7">
                            <input type="text" value="<?php echo $data['email']; ?>" class="validate[required,custom[email]] form-control" name="email"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-5 control-label">Kota</label>
                        <div class="col-md-9 col-xs-7">
                            <input type="text" value="<?php echo $data['city']; ?>" class="validate[required] form-control" id="city" name="city"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-5 control-label">Alamat</label>
                        <div class="col-md-9 col-xs-7">
                            <textarea class="validate[required] form-control" rows="5" id="address" name="address"><?php echo $data['address']; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-5 control-label">Provinsi</label>
                            <div class="col-md-9 col-xs-7">
                                <select name="province" id="province" class="form-control select">
                                     <option value="Jawa Barat" <?php if($data['province']=="Jawa Barat") echo 'selected="selected"'; ?> >Jawa Barat</option>
                                     <option value="Banten" <?php if($data['province']=="Banten") echo 'selected="selected"'; ?>>Banten</option>
                                     <option value="DKI Jakarta" <?php if($data['province']=="DKI Jakarta") echo 'selected="selected"'; ?>>DKI Jakarta</option>
                                     <option value="Jawa Tengah" <?php if($data['province']=="Jawa Tengah") echo 'selected="selected"'; ?>>Jawa Tengah</option>
                                     <option value="DI Yogyakarta" <?php if($data['province']=="DI Yogyakarta") echo 'selected="selected"'; ?>>DI Yogyakarta</option>
                                     <option value="Jawa Timur" <?php if($data['province']=="Jawa Timur") echo 'selected="selected"'; ?>>Jawa Timur</option>
                                     <option value="Nangroe Aceh Darussalam" <?php if($data['province']=="Nangroe Aceh Darussalam") echo 'selected="selected"'; ?>>Nangroe Aceh Darussalam</option>
                                     <option value="Sumatera Utara" <?php if($data['province']=="Sumatera Utara") echo 'selected="selected"'; ?>>Sumatera Utara</option>
                                     <option value="Sumatera Barat" <?php if($data['province']=="Sumatera Barat") echo 'selected="selected"'; ?>>Sumatera Barat</option>
                                     <option value="Bengkulu" <?php if($data['province']=="Bengkulu") echo 'selected="selected"'; ?>>Bengkulu</option>
                                     <option value="Jambi" <?php if($data['province']=="Jambi") echo 'selected="selected"'; ?>>Jambi</option>
                                     <option value="Riau" <?php if($data['province']=="Riau") echo 'selected="selected"'; ?>>Riau</option>
                                     <option value="Kepulauan Riau" <?php if($data['province']=="Kepulauan Riau") echo 'selected="selected"'; ?>>Kepulauan Riau</option>
                                     <option value="Sumatera Selatan" <?php if($data['province']=="Sumatera Selatan") echo 'selected="selected"'; ?>>Sumatera Selatan</option>
                                     <option value="Bangka Belitung" <?php if($data['province']=="Bangka Belitung") echo 'selected="selected"'; ?>>Bangka Belitung</option>
                                     <option value="Lampung" <?php if($data['province']=="Lampung") echo 'selected="selected"'; ?>>Lampung</option>
                                     <option value="Kalimantan Barat" <?php if($data['province']=="Kalimantan Barat") echo 'selected="selected"'; ?>>Kalimantan Barat</option>
                                     <option value="Kalimantan Tengah" <?php if($data['province']=="Kalimantan Tengah") echo 'selected="selected"'; ?>>Kalimantan Tengah</option>
                                     <option value="Kalimantan Selatan" <?php if($data['province']=="Kalimantan Selatan") echo 'selected="selected"'; ?>>Kalimantan Selatan</option>
                                     <option value="Kalimantan Utara" <?php if($data['province']=="Kalimantan Utara") echo 'selected="selected"'; ?>>Kalimantan Utara</option>
                                     <option value="Kalimantan Timur" <?php if($data['province']=="Kalimantan Timur") echo 'selected="selected"'; ?>>Kalimantan Timur</option>
                                     <option value="Sulawesi Utara" <?php if($data['province']=="Sulawesi Utara") echo 'selected="selected"'; ?>>Sulawesi Utara</option>
                                     <option value="Gorontalo" <?php if($data['province']=="Gorontalo") echo 'selected="selected"'; ?>>Gorontalo</option>
                                     <option value="Sulawesi Tengah" <?php if($data['province']=="Sulawesi Tengah") echo 'selected="selected"'; ?>>Sulawesi Tengah</option>
                                     <option value="Sulawesi Barat" <?php if($data['province']=="Sulawesi Barat") echo 'selected="selected"'; ?>>Sulawesi Barat</option>
                                     <option value="Sulawesi Selatan" <?php if($data['province']=="Sulawesi Selatan") echo 'selected="selected"'; ?>>Sulawesi Selatan</option>
                                     <option value="Sulawesi Tenggara" <?php if($data['province']=="Sulawesi Tenggara") echo 'selected="selected"'; ?>>Sulawesi Tenggara</option>
                                     <option value="Bali" <?php if($data['province']=="Bali") echo 'selected="selected"'; ?>>Bali</option>
                                     <option value="Nusa Tenggara Barat" <?php if($data['province']=="Nusa Tenggara Barat") echo 'selected="selected"'; ?>>Nusa Tenggara Barat</option>
                                     <option value="Nusa Tenggara Timur" <?php if($data['province']=="Nusa Tenggara Timur") echo 'selected="selected"'; ?>>Nusa Tenggara Timur</option>
                                     <option value="Maluku" <?php if($data['province']=="Maluku") echo 'selected="selected"'; ?>>Maluku</option>
                                     <option value="Maluku Utara" <?php if($data['province']=="Maluku Utara") echo 'selected="selected"'; ?>>Maluku Utara</option>
                                     <option value="Papua Barat" <?php if($data['province']=="Papua Barat") echo 'selected="selected"'; ?>>Papua Barat</option>
                                     <option value="Papua" <?php if($data['province']=="Papua") echo 'selected="selected"'; ?>>Papua</option>
                                </select>
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-5 control-label">Kode Pos</label>
                        <div class="col-md-9 col-xs-7">
                            <input id="postcode" name="postcode" type="text" value="<?php echo $data['postcode']; ?>" class="validate[required,custom[integer],minSize[5],min[1]] form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-5 control-label">Nomor Telepon</label>
                        <div class="col-md-9 col-xs-7">
                            <input id="phoneNumber" name="phoneNumber" type="text" value="<?php echo $data['contact']; ?>" class="validate[required,custom[integer],minSize[11],maxSize[13],min[0]] form-control"/>
                        </div>
                    </div>

                    <?php
                        if ($role_id == 1) {
                    ?>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-5 control-label">Role</label>
                            <div class="col-md-9 col-xs-7">
                                <select name="role_id" id="role_id" class="form-control select">
                                     <option value="1" <?php if($data['role_id']=="1") echo 'selected="selected"'; ?> >Admin</option>
                                     <option value="2" <?php if($data['role_id']=="2") echo 'selected="selected"'; ?>>User</option>
                                </select>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="form-group">
                        <div class="col-md-12 col-xs-5">
                            <button class="btn btn-primary btn-rounded pull-right" name="edit-user">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>

        </div>
        
        <div class="col-md-3">
            <div class="panel panel-default form-horizontal">
                <div class="panel-body">
                    <h3><span class="fa fa-info-circle"></span> Quick Info</h3>
                    <p>Some quick info about this user</p>
                </div>
                <div class="panel-body form-group-separated">
                    <div class="form-group">
                        <label class="col-md-4 col-xs-5 control-label">Contact</label>
                        <div class="col-md-8 col-xs-7 line-height-30"><?php echo $data['contact']; ?></div>
                    </div>
                    <label class="col-md-4 col-xs-5 control-label">Anggota Sejak</label>
                    <div class="col-md-8 col-xs-7 line-height-30">
                        <?php 
                            $str = $data['created_at'];
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
        
    </div>
    
    <!-- MODALS -->
        <div class="modal animated fadeIn" id="modal_change_photo" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="smallModalHead">Change photo</h4>
                    </div>                    
                    <!-- <form id="cp_crop" method="post" action="assets/crop_image.php"> -->
                    <!-- <form id="cp_upload" method="post" enctype="multipart/form-data" action="assets/upload_image.php"> -->
                    <form action="controller/edit_user.php" method="post" id="validate" role="form" class="form-horizontal" action="javascript:alert('Form #validate submited');" enctype="multipart/form-data">
                    <input type="hidden" name="get_id" value="<?php echo $id; ?>">
                    <div class="modal-body form-horizontal form-group-separated">
                        <div class="form-group">
                            <label class="col-md-4 control-label">New Photo</label>
                            <div class="col-md-4">
                                <!-- <input type="file" class="fileinput btn-info" name="img_user" id="img" data-filename-placement="inside" title="Select file"/> -->
                                <input type="file" class="fileinput btn-info" name="img_user" id="img_user" required="" />
                            </div>                            
                        </div>                        
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="edit-user-img">Upload</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="modal animated fadeIn" id="modal_change_password" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="controller/edit_user.php" method="post" id="validate" role="form" class="form-horizontal" action="javascript:alert('Form #validate submited');">
                        <input type="hidden" name="get_id" value="<?php echo $id; ?>">
                        <div class="modal-body form-horizontal form-group-separated">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Old Password</label>
                                <div class="col-md-9">
                                    <input type="password" class="validate[required] form-control" name="old_password"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">New Password</label>
                                <div class="col-md-9">
                                    <input id="password" name="password" placeholder="Password" value="" type="password" class="validate[required,minSize[5]] form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Repeat New</label>
                                <div class="col-md-9">
                                    <input id="confirmpass" name="confirmpass" placeholder="Konfirmasi Password" value="" type="password" class="validate[required,equals[password]] form-control">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <label class="col-md-3 control-label">Change Password</label>
                            <button type="submit" class="btn btn-danger" name="edit-user-password">Proccess</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>        
        <!-- EOF MODALS -->

</div>
<!-- END PAGE CONTENT WRAPPER -->
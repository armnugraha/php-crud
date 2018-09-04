<?php
    include('connection/connection.php');

    $id_user = $_SESSION['id'];
    
    $id = $_GET['get_id'];

    $role_id = $_SESSION['role_id'];
    
    $show = mysql_query("SELECT * FROM buildings WHERE id='$id'");

    $show_image = mysql_query("SELECT * FROM building_files WHERE building_id='$id'");

    if(mysql_num_rows($show) == 0 || $id_user == null){
            //jika tidak ada data yg sesuai maka akan langsung di arahkan ke halaman depan atau beranda -> index.php
        echo '<script>window.history.back()</script>';
        
    }else{
        $data = mysql_fetch_assoc($show);
    }
?>

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">
            
            <form action="controller/buildingsController.php" class="form-horizontal" method="post" id="validate" role="form" class="form-horizontal" action="javascript:alert('Form #validate submited');" enctype="multipart/form-data">
            <input type="hidden" name="get_id" value="<?php echo $data['id']; ?>">
            <div class="panel panel-default">
                <div class="panel-body">
                    <p>Edit iklan</p>
                </div>
                <div class="panel-body form-group-separated">
                    
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Judul</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" id="name" name="name"  class="validate[required,maxSize[200]] form-control" value="<?php echo $data['title']; ?>" />
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">                                        
                        <label class="col-md-3 col-xs-12 control-label">Tipe Iklan</label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <label class="check"><input type="radio" class="iradio" name="jenis" value="jual" checked="checked"/> Jual </label>
                                <label class="check" style="margin-left: 40px;"><input type="radio" class="iradio" name="jenis" value="sewa"/> Sewa</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Harga</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" id="harga" name="harga" class="validate[required,custom[integer],min[1000000]] form-control" value="<?php echo $data['price']; ?>"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Deskripsi</label>
                        <div class="col-md-6 col-xs-12">
                            <textarea class="validate[required,minSize[10]] form-control" rows="5" id="deskripsi" name="deskripsi"><?php echo $data['description']; ?></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Kota</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" class="validate[required,maxSize[50]] form-control" id="city" name="city" value="<?php echo $data['city']; ?>"/>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Provinsi</label>
                        <div class="col-md-6 col-xs-12">
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
                        <label class="col-md-3 col-xs-12 control-label">Alamat</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <textarea id="alamat" name="alamat" class="validate[required,minSize[8],maxSize[250]] form-control" rows="5"><?php echo $data['address']; ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Kamar Tidur</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" class="validate[required,custom[integer],min[1]] form-control" id="kamar_tidur" name="kamar_tidur" value="<?php echo $data['jml_kmr_tdr']; ?>"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Kamar Mandi</label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" class="validate[required,custom[integer],min[1]] form-control" id="kamar_mandi" name="kamar_mandi" value="<?php echo $data['jml_kmr_mandi']; ?>"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Jumlah Garasi</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" class="validate[custom[integer],min[0]] form-control" id="garasi" name="garasi" value="<?php echo $data['jml_garasi']; ?>"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Jumlah Lantai</label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" class="validate[required,custom[integer],min[1]] form-control" id="lantai" name="lantai" value="<?php echo $data['jml_lantai']; ?>"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Luas Tanah</label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" class="validate[required,custom[integer],min[1]] form-control" id="tanah" name="tanah" value="<?php echo $data['luas_tanah']; ?>"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Luas Bangunan</label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" class="validate[required,custom[integer],min[1]] form-control" id="bangunan" name="bangunan" value="<?php echo $data['luas_bangunan']; ?>"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Tahun Dibangun</label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" class="validate[required,custom[integer],min[2000]] form-control" id="thn_bangun" name="thn_bangun" value="<?php echo $data['tahun_dibangun']; ?>"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Daya Listrik</label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" class="validate[required,custom[integer],min[200]] form-control" id="listrik" name="listrik" value="<?php echo $data['jml_watt']; ?>"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Sumber Air</label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" class="validate[required,maxSize[50]] form-control" id="sumber_air" name="sumber_air" value="<?php echo $data['sumber_air']; ?>"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Sertifikat</label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" class="validate[required,maxSize[50]] form-control" id="sertifikat" name="sertifikat" value="<?php echo $data['sertifikat']; ?>"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Fasilitas</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" class="validate[required,minSize[8],maxSize[100]] form-control" id="fasilitas" name="fasilitas" value="<?php echo $data['fasilitas']; ?>"/>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Default Background</label>
                        <div class="col-md-6 col-xs-12">                                
                            <div class="image">                              
                                <img src="assets/building_files/<?php echo $data['id']; ?>/<?php echo $data['img']; ?>" style="border-radius: 0%; float: left; height: 80px;">
                            </div><!-- 

                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                            <input type="file" class="fileinput btn-primary" name="filename" id="filename"/> -->
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">More File</label>
                        <div class="col-md-6 col-xs-12">
                            <?php
                                while($data_image = mysql_fetch_assoc($show_image)){
                                echo '<a class="gallery-item" href="assets/building_files/'.$data['id'].'/'.$data_image['name'].'" title="Image" data-gallery>
                                        <div class="image">                              
                                            <img src="assets/building_files/'.$data['id'].'/'.$data_image['name'].'" style="border-radius: 0%; float: left; height: 80px;">
                                        </div>
                                    </a>';
                                echo '<br><br><br><br> &nbsp; &nbsp; &nbsp; &nbsp;';
                                ?>
                                    <a href="controller/delete_img_building.php?get_id=<?php echo $data_image['id']; ?>&name=<?php echo $data_image['name']; ?>&nm=<?php echo $data['id']; ?>" class="btn btn-danger btn-rounded btn-condensed btn-sm" data-toggle="tooltip" data-placement="right" title="" data-original-title="Delete Image"><span class="fa fa-times"></span></a>
                                <?php }
                              ?>
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                            <input type="file" class="fileinput btn-primary" name="image[]" id="image" style="margin-left: 25px;">
                            <input type="file" class="fileinput btn-primary" name="image[]" id="image" style="margin-left: 25px;">
                            <input type="file" class="fileinput btn-primary" name="image[]" id="image" style="margin-left: 25px;">
                            <input type="file" class="fileinput btn-primary" name="image[]" id="image" style="margin-left: 25px;">
                        </div>
                    </div>
                    
                </div>
                <div class="panel-footer">
                    <button type="submit" class="btn btn-primary pull-right" style="margin-right: 5%;" name="edit-building">Submit</button>
                </div>
            </div>
            </form>
            
        </div>
    </div>                    
    
</div>
<!-- END PAGE CONTENT WRAPPER -->

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
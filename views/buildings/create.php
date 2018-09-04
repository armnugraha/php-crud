<?php

    // error_reporting(0);
    include('connection/connection.php');

    $id_user = $_SESSION['id'];
    
    if($id_user == null){
            //jika tidak ada data yg sesuai maka akan langsung di arahkan ke halaman depan atau beranda -> index.php
        echo '<script>window.history.back()</script>';   
    }
?>

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">
            
            <form action="controller/create_building.php" class="form-horizontal" method="post" id="validate" role="form" class="form-horizontal" action="javascript:alert('Form #validate submited');" enctype="multipart/form-data">
            <div class="panel panel-default">
                <div class="panel-body">
                    <p>+ Tambah iklan</p>
                </div>
                <div class="panel-body form-group-separated">
                    
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Judul</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" id="name" name="name"  class="validate[required,maxSize[200]] form-control"/>
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
                                <input type="text" id="harga" name="harga" class="validate[required,custom[integer],min[1000000]] form-control"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Deskripsi</label>
                        <div class="col-md-6 col-xs-12">
                            <textarea class="validate[required,minSize[10]] form-control" rows="5" id="deskripsi" name="deskripsi"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Kota</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" class="validate[required,maxSize[50]] form-control" id="city" name="city"/>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Provinsi</label>
                        <div class="col-md-6 col-xs-12">
                            <select name="province" id="province" class="validate[required] form-control select">
                                 <option value="Jawa Barat">Jawa Barat</option>
                                 <option value="Banten">Banten</option>
                                 <option value="DKI Jakarta">DKI Jakarta</option>
                                 <option value="Jawa Tengah">Jawa Tengah</option>
                                 <option value="DI Yogyakarta">DI Yogyakarta</option>
                                 <option value="Jawa Timur">Jawa Timur</option>
                                 <option value="Nangroe Aceh Darussalam">Nangroe Aceh Darussalam</option>
                                 <option value="Sumatera Utara">Sumatera Utara</option>
                                 <option value="Sumatera Barat">Sumatera Barat</option>
                                 <option value="Bengkulu">Bengkulu</option>
                                 <option value="Jambi">Jambi</option>
                                 <option value="Riau">Riau</option>
                                 <option value="Kepulauan Riau`">Kepulauan Riau</option>
                                 <option value="Sumatera Selatan">Sumatera Selatan</option>
                                 <option value="Bangka Belitung">Bangka Belitung</option>
                                 <option value="Lampung">Lampung</option>
                                 <option value="Kalimantan Barat">Kalimantan Barat</option>
                                 <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                                 <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                                 <option value="Kalimantan Utara">Kalimantan Utara</option>
                                 <option value="Kalimantan Timur">Kalimantan Timur</option>
                                 <option value="Sulawesi Utara">Sulawesi Utara</option>
                                 <option value="Gorontalo">Gorontalo</option>
                                 <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                                 <option value="Sulawesi Barat">Sulawesi Barat</option>
                                 <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                                 <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                                 <option value="Bali">Bali</option>
                                 <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                                 <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                                 <option value="Maluku">Maluku</option>
                                 <option value="Maluku Utara">Maluku Utara</option>
                                 <option value="Papua Barat">Papua Barat</option>
                                 <option value="Papua">Papua</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Alamat</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <textarea id="alamat" name="alamat" class="validate[required,minSize[8],maxSize[250]] form-control" rows="5"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Kamar Tidur</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" class="validate[required,custom[integer],min[1]] form-control" id="kamar_tidur" name="kamar_tidur"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Kamar Mandi</label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" class="validate[required,custom[integer],min[1]] form-control" id="kamar_mandi" name="kamar_mandi"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Jumlah Garasi</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" class="validate[custom[integer],min[0]] form-control" id="garasi" name="garasi"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Jumlah Lantai</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" class="validate[required,custom[integer],min[1]] form-control" id="lantai" name="lantai"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Luas Tanah</label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" class="validate[required,custom[integer],min[1]] form-control" id="tanah" name="tanah"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Luas Bangunan</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" class="validate[required,custom[integer],min[1]] form-control" id="bangunan" name="bangunan"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Tahun Dibangun</label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" class="validate[required,custom[integer],min[2000]] form-control" id="thn_bangun" name="thn_bangun"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Daya Listrik</label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" class="validate[required,custom[integer],min[200]] form-control" id="listrik" name="listrik"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Sumber Air</label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" class="validate[required,maxSize[50]] form-control" id="sumber_air" name="sumber_air"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Sertifikat</label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" class="validate[required,maxSize[50]] form-control" id="sertifikat" name="sertifikat"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Fasilitas</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" class="validate[required,minSize[8],maxSize[100]] form-control" id="fasilitas" name="fasilitas"/>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Set For Background</label>
                        <div class="col-md-6 col-xs-12">                                
                            <input type="file" class="fileinput btn-primary" name="filename" id="filename" required="" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">More File</label>
                        <div class="col-md-6 col-xs-12">
                            <input type="file" class="fileinput btn-primary" name="image[]" id="image" style="margin-left: 25px;">
                            <input type="file" class="fileinput btn-primary" name="image[]" id="image" style="margin-left: 25px;">
                            <input type="file" class="fileinput btn-primary" name="image[]" id="image" style="margin-left: 25px;">
                            <input type="file" class="fileinput btn-primary" name="image[]" id="image" style="margin-left: 25px;">
                        </div>
                    </div>
                    
                </div>
                <div class="panel-footer">
                    <button class="btn btn-primary pull-right" style="margin-right: 5%;" name="tambah">Submit</button>
                </div>
            </div>
            </form>
            
        </div>
    </div>                    
    
</div>
<!-- END PAGE CONTENT WRAPPER -->
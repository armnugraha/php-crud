<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>Home Hunter</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="../../assets/css/icons/home.png" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="../../assets/css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->                                      
    </head>
    <body>
        
        <div class="registration-container registration-extended">            
            <div class="registration-box animated fadeInDown">
                <div class="registration-logo" style="background: url('../../assets/images/home-hunter.png') center no-repeat;"></div>
                <div class="registration-body">
                    
                    <div class="row">                        
                        <div class="col-md-6">
                            
                           <div class="registration-title"><strong>Welcome</strong>, Please login</div>
                            <form action="../../controller/proses_login.php" method="post" id="validate" role="form" class="form-horizontal" action="javascript:alert('Form #validate submited');">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="validate[required] form-control" placeholder="Username" name="user_name"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="password" class="validate[required] form-control" placeholder="Password" name="password" />
                                </div>
                            </div>
                            <div class="form-group push-down-30">
                                <div class="col-md-6">
                                    <button class="btn btn-info btn-block">Log In</button>
                                </div>
                            </div>
                            </form> 
                            
                        </div>
                        <div class="col-md-6">
                            
                            <div class="registration-title"><strong>Registration</strong>, use form below</div>
                            <form action="../../controller/create_user.php" class="form-horizontal" method="post" id="validate" role="form" class="form-horizontal" action="javascript:alert('Form #validate submited');">

                                <h4>Personal info</h4>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input id="fullName" name="fullName" placeholder="Nama Lengkap" value="" type="text" size="40" class="validate[required,maxSize[25]] form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input id="city" name="city" placeholder="Kota" value="" type="text" class="validate[required,maxSize[50]] form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <select name="province" id="province" class="form-control">
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
                                    <div class="col-md-12">
                                        <textarea id="address" name="address" placeholder="Alamat" value="" rows="5" cols="40" class="validate[required,maxSize[200]] form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input id="postcode" name="postcode" placeholder="Kode Pos" value="" type="text" class="validate[required,custom[integer],minSize[5],maxSize[7],min[0]] form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input id="phoneNumber" name="phoneNumber" placeholder="Nomor Telepon" value="" type="text" class="validate[required,custom[integer],minSize[11],maxSize[13],min[0]] form-control"/>
                                    </div>
                                </div>

                                <h4>Authentication</h4>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input id="username" name="username" placeholder="Username" value="" type="text" class="validate[required,maxSize[50]] form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="email" name="email" class="validate[required,custom[email,maxSize[50]]] form-control" placeholder="Email"/>
                                    </div>
                                </div>                        
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input id="password" name="password" placeholder="Password" value="" type="password" class="validate[required,minSize[5]] form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input id="confirmpass" name="confirmpass" placeholder="Konfirmasi Password" value="" type="password" class="validate[required,equals[password]] form-control">
                                    </div>
                                </div>

                                <div class="form-group push-up-30">
                                    <div class="col-md-6">
                                        <button class="btn btn-danger btn-block" name="register-user" type="submit">Sign Up</button>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                    
                </div>
                
                <div class="registration-footer">
                    <div class="pull-left">
                        &copy; <?php echo(date("Y")) ?> Home Hunter
                    </div>
                </div>
            </div>
            
        </div>
        


        <!-- START PRELOADS -->
        <audio id="audio-alert" src="../../assets/audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="../../assets/audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                 
        
        <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="../../assets/js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="../../assets/js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="../../assets/js/plugins/bootstrap/bootstrap.min.js"></script>
        <!-- END PLUGINS -->
        
        <!-- THIS PAGE PLUGINS -->
        <script type='text/javascript' src='../../assets/js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="../../assets/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        
        <script type='text/javascript' src='../../assets/js/plugins/bootstrap/bootstrap-datepicker.js'></script>
        <script type='text/javascript' src='../../assets/js/plugins/bootstrap/bootstrap-select.js'></script>

        <script type='text/javascript' src='../../assets/js/plugins/validationengine/languages/jquery.validationEngine-en.js'></script>
        <script type='text/javascript' src='../../assets/js/plugins/validationengine/jquery.validationEngine.js'></script>

        <script type='text/javascript' src='../../assets/js/plugins/jquery-validation/jquery.validate.js'></script>

        <script type='text/javascript' src='../../assets/js/plugins/maskedinput/jquery.maskedinput.min.js'></script>
        <!-- END THIS PAGE PLUGINS -->

        <!-- START TEMPLATE -->
        
        <script type="text/javascript" src="../../assets/js/plugins.js"></script>
        <script type="text/javascript" src="../../assets/js/actions.js"></script>
        <!-- END TEMPLATE -->
    </body>
</html>
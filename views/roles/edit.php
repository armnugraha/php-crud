<?php

    // error_reporting(0);
    include('connection/connection.php');

    $id_user = $_SESSION['id'];
    $role_id = $_SESSION['role_id'];
    
    $id = $_GET['get_id'];
    
    $show = mysql_query("SELECT * FROM roles WHERE id='$id'");
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
    <h2><span class="fa fa-cogs"></span> Edit Role</h2>
</div>
<!-- END PAGE TITLE -->                     

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    
    <div class="row">
        <div class="col-md-6 col-sm-8 col-xs-7">
            
            <form action="controller/rolesController.php" id="validate" method="post" role="form" class="form-horizontal" action="javascript:alert('Form #validate submited');">

            <input type="hidden" name="get_id" value="<?php echo $data['id']; ?>">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3><span class="fa fa-pencil"></span> Role</h3>
                    
                </div>
                <div class="panel-body form-group-separated">
                    <div class="form-group">
                        <label class="col-md-3 col-xs-5 control-label">Name</label>
                        <div class="col-md-9 col-xs-7">
                            <input type="text" value="<?php echo $data['name']; ?>" class="validate[required] form-control" id="name" name="name"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12 col-xs-5">
                            <button class="btn btn-primary btn-rounded pull-right" name="edit-role">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>

        </div>
        
    </div>

</div>
<!-- END PAGE CONTENT WRAPPER -->
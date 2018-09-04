<?php

    // error_reporting(0);
    include('connection/connection.php');

    $id_user = $_SESSION['id'];
    $role_id = $_SESSION['role_id'];
    
    $id = $_GET['get_id'];
    
    if($id_user == null || $role_id != 1 || $id_user != $id){
        echo '<script>window.history.back()</script>';    
    }
?>

<!-- PAGE TITLE -->
<div class="page-title">                    
    <h2><span class="fa fa-cogs"></span> Create Role</h2>
</div>
<!-- END PAGE TITLE -->                     

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    
    <div class="row">
        <div class="col-md-6 col-sm-8 col-xs-7">
            
            <form action="controller/rolesController.php" id="validate" method="post" role="form" class="form-horizontal" action="javascript:alert('Form #validate submited');">

            <div class="panel panel-default">
                <div class="panel-body">
                    <h3><span class="fa fa-pencil"></span> Role</h3>
                    
                </div>
                <div class="panel-body form-group-separated">
                    <div class="form-group">
                        <label class="col-md-3 col-xs-5 control-label">Name</label>
                        <div class="col-md-9 col-xs-7">
                            <input type="text" class="validate[required, maxSize[15]] form-control" id="name" name="name"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12 col-xs-5">
                            <button class="btn btn-primary btn-rounded pull-right" name="save">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>

        </div>
        
    </div>

</div>
<!-- END PAGE CONTENT WRAPPER -->
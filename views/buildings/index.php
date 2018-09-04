<?php 
    include 'connection/connection.php';
    $id_user = $_SESSION['id'];

    $show = mysql_query("SELECT * FROM buildings WHERE user_id='$id'");

    if(mysql_num_rows($show) == 0 || $id_user == null){
        echo '<script>window.history.back()</script>';   
    }
?>

<!-- START RESPONSIVE TABLES -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">

            <div class="panel-heading">
                <h3 class="panel-title">List Iklan</h3>
            </div>

            <div class="panel-body panel-body-table">

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-actions">
                        <thead>
                            <tr>
                                <th width="50">id</th>
                                <th>name</th>
                                <th width="100">type</th>
                                <th width="180">price</th>
                                <th width="200">date</th>
                                <th>Expire Date</th>
                                <th>Status</th>
                                <th width="120">actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include 'connection/connection.php';

                            $id_user = $_SESSION['id'];

                            if (isset($_GET['pages'])) {
                                $page = $_GET['pages'];
                            } else {
                                $page = 1;
                            }

                            $no_of_records_per_page = 10;
                            $offset = ($page-1) * $no_of_records_per_page;

                            $total_pages_sql = "SELECT COUNT(*) FROM buildings WHERE user_id=$id_user";
                            $result = mysql_query($total_pages_sql);
                            $total_rows = mysql_fetch_array($result)[0];
                            $total_pages = ceil($total_rows / $no_of_records_per_page);

                            $sql ="SELECT * FROM buildings WHERE user_id=$id_user ORDER BY id DESC LIMIT $offset, $no_of_records_per_page";
                            //untuk menyeleksi data error
                            $query =mysql_query($sql) or die();
                            while($record =mysql_fetch_array($query)){
                        ?>
                            <tr id="trow_1">
                                <td class="text-center"><?php echo $record['id'] ?></td>
                                <td><strong><?php echo htmlspecialchars($record['title']) ?></strong></td>
                                <td><?php echo $record['type'] ?></td>
                                <td><strong>Rp. </strong><?php echo $record['price'] ?></td>
                                <td><?php echo $record['created_at'] ?></td>
                                <td><?php echo $record['expiredate'];?></td>
                                <td>
                                    <?php 
                                        if ($record['expiredate'] >= date("Y-m-d H:m:s")) {
                                            echo '<button class="btn btn-success btn-rounded btn-condensed btn-sm" data-toggle="tooltip" data-placement="right" title="" data-original-title="Active">Active</button>';
                                        }else{
                                            echo '<button class="btn btn-warning btn-rounded btn-condensed btn-sm" data-toggle="tooltip" data-placement="right" title="" data-original-title="Not Active">Expired</button>';
                                        }
                                    ?>
                                </td>
                                <td>
                                    <a href="index.php?page=views/buildings/edit&get_id=<?php echo $record['id']; ?>"><button class="btn btn-default btn-rounded btn-condensed btn-sm"><span class="fa fa-pencil"></span></button></a>
                                    <a href="controller/buildingsController.php?get_id=<?php echo $record['id']; ?>"><button class="btn btn-danger btn-rounded btn-condensed btn-sm" onClick="delete_row('trow_1');"><span class="fa fa-times"></span></button></a>
                                </td>
                            </tr>
                        <?php }?>
                        </tbody>
                    </table>

                    <?php
                            if ($cek != null && $total_rows >= $no_of_records_per_page) {
                            ?>
                                <ul class="pagination pagination-sm pull-right push-down-20">
                                    <?php if($page <= 1){ 

                                        } else{
                                            echo '<li class=""><a href="index.php?page=views/buildings/index&pages=1">First</a></li>';
                                        }
                                    ?>
                                    <li class="<?php if($page <= 1){ echo 'disabled'; } ?>">
                                        <a href="<?php if($page <= 1){ echo '#'; } else { echo "index.php?page=views/buildings/index&pages=".($page - 1); } ?>">Prev</a>
                                    </li>
                                    <li class="<?php if($page >= $total_pages){ echo 'disabled'; } ?>">
                                        <a href="<?php if($page >= $total_pages){ echo '#'; } else { echo "index.php?page=views/buildings/index&pages=".($page + 1); } ?>">Next</a>
                                    </li>
                                    <li><a href="index.php?page=views/buildings/index&pages=<?php echo $total_pages; ?>">Last</a></li>
                                </ul>
                    <?php } ?>

                </div>

            </div>
        </div>

    </div>
</div>
<!-- END RESPONSIVE TABLES -->
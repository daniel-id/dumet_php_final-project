<?php
if(isset($_POST["update"])) {
    $admin_id   = $_POST["admin_id"];
    $username   = $_POST["username"];
    $password   = MD5($_POST["password"]);
    mysqli_query($connect, "UPDATE admin SET username = '$username', password = '$password'
                            WHERE id = '$admin_id'");
    header("location:index.php?administrator");
} 
 
/* TAMPILKAN DATA PADA FORM */
$id_admin      = $_GET["administrator-update"];
$edit          = mysqli_query($connect, "SELECT * FROM admin WHERE id = '$id_admin'");
$row_edit      = mysqli_fetch_array($edit);

$query  = mysqli_query($connect, "SELECT * FROM admin ORDER BY id DESC");
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Blog &raquo; Administrator</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Input Data
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form role="form" action="" method="post">
                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" type="text" name="username" value="<?php echo $row_edit["username"] ?>"/>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="password" name="password" value="<?php echo $row_edit["password"] ?>"/>
                            </div>
                            <button type="submit" name="update" class="btn btn-success">Update</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                            <input type="hidden" name="admin_id" value="<?php echo $row_edit["id"] ?>">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                List Data
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(mysqli_num_rows($query)) { ?>
                            <?php while($row=mysqli_fetch_array($query)) { ?>
                            <tr>
                                <td><?php echo $row["username"] ?></td>
                                <td><?php echo $row["password"] ?></td>
                                <td class="center"><a href="index.php?administrator-update=<?php echo $row["id"] ?>" class="btn btn-primary btn-xs" type="button">Update</a></td>
                                <td class="center"><a href="index.php?administrator-delete=<?php echo $row["id"] ?>" class="btn btn-primary btn-xs" type="button">Delete</a></td>
                            </tr>
                            <?php } ?>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
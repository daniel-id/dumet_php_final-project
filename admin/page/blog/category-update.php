<?php
if(isset($_POST["update"])) {
    $category_id    = $_POST["id_category"];
    $name           = $_POST["name"];
    $icon           = $_POST["icon"];
    mysqli_query($connect, "UPDATE category SET category_name = '$name', icon = '$icon'
                            WHERE id = '$category_id'");
    header("location:index.php?category");
}


$id_category    = $_GET["category-update"];
$edit           = mysqli_query($connect, "SELECT * FROM category WHERE id = '$id_category'");
$row_edit       = mysqli_fetch_array($edit);

$category       = mysqli_query($connect, "SELECT * FROM category ORDER BY id DESC");
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Blog &raquo; Category</h1>
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
                                <label>Name</label>
                                <input class="form-control" type="text" name="name" value="<?php echo $row_edit["category_name"]?>"/>
                            </div>
                            <div class="form-group">
                                <label>Icon</label>
                                <input class="form-control" type="text" name="icon" value="<?php echo $row_edit["icon"]?>"/>
                            </div>
                            <button type="submit" name="update" class="btn btn-success">Update</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                            <input type="hidden" name="id_category" value="<?php echo $row_edit["id"]?>">
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
                                <th>Name</th>
                                <th>Icon</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(mysqli_num_rows($category)) { ?>
                            <?php while($row_category = mysqli_fetch_array($category)) { ?>
                            <tr>
                                <td><?php echo $row_category["category_name"] ?></td>
                                <td>
                                <span class="<?php echo $row_category["icon"]?>"></span> <?php echo $row_category["icon"]?>
                                </td>
                                <td class="center"><a href="index.php?category-update=<?php echo $row_category["id"] ?>" class="btn btn-primary btn-xs" type="button">Update</a></td>
                                <td class="center"><a href="index.php?category-delete=<?php echo $row_category["id"] ?>" class="btn btn-primary btn-xs" type="button">Delete</a></td>
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
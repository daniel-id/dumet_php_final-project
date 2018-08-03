<?php
if(isset($_POST["submit"])) {
    $category_id = $_POST["category_id"];
    $title       = $_POST["title"];
    $description = $_POST["description"];
    $date        = date("Y-m-d H:i:s");

    $file_name   = $_FILES["file"]["name"];
    $tmp_name    = $_FILES["file"]["tmp_name"];
    move_uploaded_file($tmp_name, "../img/".$file_name);
    mysqli_query($connect, "INSERT INTO post VALUES(null,'$category_id','$title','$description','$file_name',' ','$date')");
    header("location:index.php?post");
}

$category   = mysqli_query($connect, "SELECT * FROM category ORDER BY id ASC");

$post       = mysqli_query($connect, "SELECT post.*, category.category_name
                                      FROM post, category
                                      WHERE post.category_id = category.id
                                      ORDER BY post.id DESC");
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Blog &raquo; Post</h1>
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
                        <form role="form" action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="category_id">
                                    <option value=""> - choose - </option>
                                    <?php if(mysqli_num_rows($category)) { ?>
                                        <?php while($row_cat = mysqli_fetch_array($category)) { ?>
                                            <option value="<?php echo $row_cat["id"] ?>"> <?php echo $row_cat["category_name"] ?> </option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" type="text" name="title" />
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="3" name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="file" />
                            </div>
                            <button type="submit" name="submit" class="btn btn-success">Save</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
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
                                <th>Category</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(mysqli_num_rows($post)) { ?>
                            <?php while($row_post=mysqli_fetch_array($post)) { ?>
                            <tr>
                                <td><?php echo $row_post["category_name"] ?></td>
                                <td><?php echo $row_post["title"] ?></td>
                                <td><?php echo $row_post["description"] ?></td>
                                <td>
                                <?php
                                    if($row_post["image"]=="") {
                                        echo "<img src='asset/no-image.png' width='88'/>";
                                    } else { ?>
                                        <img src="../img/<?php echo $row_post["image"] ?>" width="88" class="img-responsive" />
                                <?php } ?>
                                </td>
                                <td class="center"><a href="index.php?post-update=<?php echo $row_post["id"] ?>" class="btn btn-primary btn-xs" type="button">Update</a></td>
                                <td class="center"><a href="index.php?post-delete=<?php echo $row_post["id"] ?>" class="btn btn-primary btn-xs" type="button">Delete</a></td>
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
